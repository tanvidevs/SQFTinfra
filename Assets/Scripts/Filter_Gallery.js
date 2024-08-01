// Filter gallery items
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
        const filter = button.getAttribute('data-filter');
        document.querySelectorAll('.gallery-item').forEach(item => {
            if (filter === 'all' || item.classList.contains(filter)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });
});

// Get the modal
var modal = document.getElementById("myModal");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Open image in modal
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('click', () => {
        const imgSrc = item.getAttribute('data-img-src');
        const caption = item.getAttribute('data-caption');
        modal.style.display = "block";
        modalImg.src = imgSrc;
        captionText.innerHTML = caption;
    });
});

// Close modal
var span = document.getElementsByClassName("close")[0];
span.onclick = function () {
    modal.style.display = "none";
}

// Close modal on outside click
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}