<style>
        .popup-bg {
            background-color: #4ab3f4;
            background-image: linear-gradient(45deg, #4ab3f4 25%, #5bbaf5 25%, #5bbaf5 50%, #4ab3f4 50%, #4ab3f4 75%, #5bbaf5 75%, #5bbaf5 100%);
        }
</style>

<div class="bg-transparent h-96 flex items-center justify-center">

    <div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="popup-bg p-8 rounded-lg shadow-lg w-96 relative">
            <button id="closePopup" class="absolute top-2 right-2 text-white text-xl font-bold">&times;</button>
            <h2 class="text-2xl font-bold mb-4 bg-yellow-300 inline-block px-2">Leaving already?</h2>
            <p class="text-white mb-4">Subscribe to our newsletter and get all the fresh articles, online marketing tips, and bonus resources delivered straight to your inbox 💌</p>
            <form id="popupForm">
                <div class="mb-4">
                    <input type="text" id="name" name="name" placeholder="Name *" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Email *" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-2 px-4 rounded">
                    SIGN ME UP
                </button>
            </form>
            <p class="text-xs text-white mt-4">GetResponse S.A. needs data contained in this form to provide you with materials you requested. For more information, read our Privacy Policy.</p>
        </div>
    </div>

    <script>
        const closePopupButton = document.getElementById('closePopup');
        const popupOverlay = document.getElementById('popupOverlay');
        const popupForm = document.getElementById('popupForm');

        function showPopup() {
            if (!localStorage.getItem('formSubmitted')) {
                popupOverlay.classList.remove('hidden');
            }
        }

        function hidePopup() {
            popupOverlay.classList.add('hidden');
        }

        closePopupButton.addEventListener('click', hidePopup);

        popupOverlay.addEventListener('click', (e) => {
            if (e.target === popupOverlay) {
                hidePopup();
            }
        });

        popupForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            console.log('Form submitted:', { name, email });
            hidePopup();
            popupForm.reset();
            
            localStorage.setItem('formSubmitted', 'true');
            clearInterval(popupInterval);
        });

        const popupInterval = setInterval(() => {
            if (!localStorage.getItem('formSubmitted')) {
                showPopup();
            }
        }, 5000);
    </script>
</div>