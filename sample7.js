document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.flip-card');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const busNumber = card.getAttribute('data-bus-number');
            if (busNumber.includes(query)) {
                card.style.display = 'flex'; // Show card
            } else {
                card.style.display = 'none'; // Hide card
            }
        });
    });
});
