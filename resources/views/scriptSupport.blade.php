<script>
    document.addEventListener('DOMContentLoaded', function() {
        const supportIcons = document.querySelectorAll('.supportIcon');

        supportIcons.forEach(function(supportIcon) {
            supportIcon.addEventListener('click', function() {
                const supportRow = this.closest('.supportrow');
                const supportFieldContainer = supportRow.querySelector('.supportFieldContainer');
                let inputFieldVisible = supportFieldContainer.querySelector('.col-3') !== null;

                if (!inputFieldVisible) {
                    const inputField = `
                        <div class="col-3" style="margin: 0 !important; display: flex; align-items: center;">
                            <input class="effect-3" type="text" name="supported_amount" placeholder="DT" dir="rtl" style="width:150px; font-size:16px;" required>
                            <span class="focus-border" style="width:140px ; background-color : #ad374b;"></span>
                            <button type="submit" class="button" style="margin-top: 10px; margin-left:14px" >
                                <i  class="fa-regular fa-paper-plane fa-lg"></i>
                            </button>
                        </div>       
                    `;
                    supportFieldContainer.innerHTML = inputField;
                } else 
                    supportFieldContainer.innerHTML = '';
                
            });
        });

        // New code for scroll and highlight
        const form = document.getElementById('searchForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); 
            const searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();
            const pots = document.querySelectorAll('.form-container');
            let found = false;
            pots.forEach(function(pot) {
                const title = pot.querySelector('li:nth-child(2)').textContent.trim().toLowerCase();
                if (title.includes(searchTerm)) {
                    pot.scrollIntoView({ behavior: 'smooth' });
                    pot.style.boxShadow = '0 0 14px 2px #FF7A00';
                    found = true;

                } else {
                    pot.style.border = 'none';
                }
            });
            if (!found) {
                const validationSection = document.querySelector('.validation-section');
                const errorMessage = document.createElement('div');
                errorMessage.classList.add('alert', 'alert-danger');
                errorMessage.textContent = 'Cagnotte non trouvée';
                validationSection.appendChild(errorMessage);
            }
        });

        const select = document.querySelector(".typeselect");
        const options_list = document.querySelector(".typeoptions-list");
        const options = document.querySelectorAll(".typeoption");

        //show & hide options list
        select.addEventListener("click", () => {
            options_list.classList.toggle("active");
            select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");
        });

        //select option
        options.forEach((option) => {
            option.addEventListener("click", () => {
                options.forEach((option) => { option.classList.remove('selected') });
                select.querySelector("span").innerHTML = option.innerHTML;
                option.classList.add("selected");
                options_list.classList.toggle("active");
                select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");

                const selectedCategory = option.innerHTML.trim(); 

                // Loop through based on selected category
                const pots = document.querySelectorAll('.form-container');
                pots.forEach(function(pot) {
                    const category = pot.dataset.category; // Get the category name from the pot's data attribute
                    if (category === selectedCategory || selectedCategory === "Afficher toutes les catégories") {
                        pot.style.display = 'block'; // Show the pot
                    } else {
                        pot.style.display = 'none'; // Hide the pot
                    }
                });
            });
        });
    });
</script>