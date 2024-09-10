document.addEventListener("DOMContentLoaded", () => {
  if (window.location.pathname === "/") {
    confetti({
      origin: {
        x: 0.5,
        y: 0.5,
      },
      particleCount: 50,
      zIndex: 1,
      spread: 60,
      ticks: 500,
    });
  }
});
