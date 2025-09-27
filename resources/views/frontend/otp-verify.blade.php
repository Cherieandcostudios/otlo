@extends('frontend.layouts.app')

@section('title', 'Verify OTP - Otlo Cafe')

@push('styles')
<style>
.otp-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
}
.otp-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    text-align: center;
    max-width: 400px;
    width: 100%;
}
.otp-icon {
    width: 80px;
    height: 80px;
    background: #b40c25;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 40px;
    color: white;
}
.otp-title {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}
.otp-subtitle {
    color: #666;
    margin-bottom: 30px;
    line-height: 1.5;
}
.otp-inputs {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 30px;
}
.otp-input {
    width: 50px;
    height: 50px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    outline: none;
    transition: border-color 0.3s ease;
}
.otp-input:focus {
    border-color: #b40c25;
}
.verify-btn {
    width: 100%;
    background: #b40c25;
    color: white;
    border: none;
    padding: 15px;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    margin-bottom: 20px;
    transition: background 0.3s ease;
}
.verify-btn:hover {
    background: #9a0a20;
}
.verify-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
}
.resend-section {
    color: #666;
    font-size: 14px;
}
.resend-btn {
    color: #b40c25;
    background: none;
    border: none;
    cursor: pointer;
    font-weight: 600;
    text-decoration: underline;
}
.timer {
    color: #b40c25;
    font-weight: 600;
}
@media (max-width: 480px) {
    .otp-card {
        padding: 30px 20px;
    }
    .otp-inputs {
        gap: 8px;
    }
    .otp-input {
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
}
</style>
@endpush

@section('content')
<div class="otp-container">
    <div class="otp-card">
        <div class="otp-icon">📱</div>
        <h1 class="otp-title">Verify Your Email</h1>
        <p class="otp-subtitle">
            We've sent a 6-digit verification code to<br>
            <strong id="emailAddress">{{ session('otp_email') ?? 'your@email.com' }}</strong>
            {{-- @if(session('otp_code'))
            <br><br><div style="background: #fff3cd; color: #856404; padding: 10px; border-radius: 8px; margin-top: 15px;">
                <strong>Demo OTP: {{ session('otp_code') }}</strong><br>
                <small>Use this code for testing (SMS not configured)</small>
            </div>
            @endif --}}
        </p>
        
        <div class="otp-inputs">
            <input type="text" class="otp-input" maxlength="1" data-index="0">
            <input type="text" class="otp-input" maxlength="1" data-index="1">
            <input type="text" class="otp-input" maxlength="1" data-index="2">
            <input type="text" class="otp-input" maxlength="1" data-index="3">
            <input type="text" class="otp-input" maxlength="1" data-index="4">
            <input type="text" class="otp-input" maxlength="1" data-index="5">
        </div>
        
        <button class="verify-btn" id="verifyBtn">Verify OTP</button>
        
        <div class="resend-section">
            <span id="timerText">Resend OTP in <span class="timer" id="timer">60</span>s</span>
            <button class="resend-btn" id="resendBtn" style="display:none;">Resend OTP</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var timer = 60;
    var timerInterval;
    
    // Auto-focus and move between inputs
    $('.otp-input').on('input', function() {
        var index = $(this).data('index');
        if ($(this).val().length === 1 && index < 5) {
            $('.otp-input[data-index="' + (index + 1) + '"]').focus();
        }
        checkOTPComplete();
    });
    
    $('.otp-input').on('keydown', function(e) {
        var index = $(this).data('index');
        if (e.key === 'Backspace' && $(this).val() === '' && index > 0) {
            $('.otp-input[data-index="' + (index - 1) + '"]').focus();
        }
    });
    
    // Check if OTP is complete
    function checkOTPComplete() {
        var otp = '';
        $('.otp-input').each(function() {
            otp += $(this).val();
        });
        $('#verifyBtn').prop('disabled', otp.length !== 6);
    }
    
    // Start countdown timer
    function startTimer() {
        timer = 60;
        $('#timerText').show();
        $('#resendBtn').hide();
        
        timerInterval = setInterval(function() {
            timer--;
            $('#timer').text(timer);
            
            if (timer <= 0) {
                clearInterval(timerInterval);
                $('#timerText').hide();
                $('#resendBtn').show();
            }
        }, 1000);
    }
    
    // Verify OTP
    $('#verifyBtn').click(function() {
        var otp = '';
        $('.otp-input').each(function() {
            otp += $(this).val();
        });
        var email = '{{ session("otp_email") }}';
        
        if (otp.length !== 6) {
            alert('Please enter complete OTP');
            return;
        }
        
        $(this).prop('disabled', true).text('Verifying...');
        
        $.ajax({
            url: '{{ url("/auth/verify-otp") }}',
            method: 'POST',
            data: {
                email: email,
                otp: otp,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert('Verification successful!');
                    window.location.href = data.redirect || '/';
                } else {
                    alert(data.message || 'Invalid OTP');
                    $('.otp-input').val('').first().focus();
                }
            },
            error: function() {
                alert('Error verifying OTP');
            },
            complete: function() {
                $('#verifyBtn').prop('disabled', false).text('Verify OTP');
            }
        });
    });
    
    // Resend OTP
    $('#resendBtn').click(function() {
        var email = '{{ session("otp_email") }}';
        
        $.ajax({
            url: '{{ route("auth.resend-otp") }}',
            method: 'POST',
            data: {
                email: email,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert('OTP resent successfully!');
                    startTimer();
                    $('.otp-input').val('').first().focus();
                } else {
                    alert(data.message || 'Failed to resend OTP');
                }
            },
            error: function() {
                alert('Error resending OTP');
            }
        });
    });
    
    // Initialize
    startTimer();
    $('.otp-input').first().focus();
    checkOTPComplete();
});
</script>
@endpush