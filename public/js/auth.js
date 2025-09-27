// auth.js - subtle animations for auth pages
(function(){
  document.addEventListener('DOMContentLoaded', function(){
    // Ripple-like hover accent on buttons (pure CSS-friendly enhancement)
    document.querySelectorAll('.btn').forEach(function(btn){
      btn.addEventListener('mouseenter', function(){ btn.style.transform = 'translateY(-1px)'; });
      btn.addEventListener('mouseleave', function(){ btn.style.transform = ''; });
    });

    // Parallax-like zoom on hero when moving mouse (desktop only)
    var hero = document.querySelector('.auth-hero');
    if (hero && window.matchMedia('(pointer:fine)').matches) {
      hero.addEventListener('mousemove', function(e){
        var rect = hero.getBoundingClientRect();
        var cx = (e.clientX - rect.left) / rect.width - 0.5;
        var cy = (e.clientY - rect.top) / rect.height - 0.5;
        hero.style.transform = 'scale(1.03) translate(' + (cx * 6) + 'px,' + (cy * 6) + 'px)';
      });
      hero.addEventListener('mouseleave', function(){
        hero.style.transform = 'scale(1) translate(0,0)';
      });
    }
  });
})();
