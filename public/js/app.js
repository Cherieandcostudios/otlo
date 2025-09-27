// public/js/app.js - minimal starter
(function () {
  document.addEventListener('DOMContentLoaded', function () {
    // small helper: add ripple on .btn
    document.querySelectorAll('.btn').forEach(btn => {
      btn.addEventListener('mouseenter', () => btn.style.transform = 'translateY(-1px)');
      btn.addEventListener('mouseleave', () => btn.style.transform = '');
    });
  });
})();
