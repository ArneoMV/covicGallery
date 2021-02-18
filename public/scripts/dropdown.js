
$(document).ready(function() { 

//  DROPDOWN STYLE
    if (typeof selectbox == 'undefined') {

        const selectbox_style = document.getElementById("selectbox_style");
        const selectbox_technique = document.getElementById("selectbox_technique");

        const click_dropdown_style = document.getElementById("click_dropdown_style");
        const click_dropdown_technique = document.getElementById("click_dropdown_technique");

        const options_style = document.querySelectorAll(".options_style");
        const options_technique = document.querySelectorAll(".options_technique")

        const submitbtn = document.getElementById('btn_form');




        // DROPDOWN STYLE
        // Open dropdown
        click_dropdown_style.addEventListener("click", (e) => {
            e.stopPropagation();
            selectbox_style.classList.toggle("selectbox--active");
        });
        // Show selected items
        options_style.forEach((option, index) => {
            option.addEventListener("click", (e) => {
                e.stopPropagation();
            });
        });

        // DROPDOWN TECHNIQUE
        // Open dropdown
        click_dropdown_technique.addEventListener("click", (e) => {
            e.stopPropagation();
            selectbox_technique.classList.toggle("selectbox--active");
        });
        // Show selected items
        options_technique.forEach((option, index) => {
            option.addEventListener("click", (e) => {
                e.stopPropagation();
            });
        });

    }




    // VALUES OF SELECTED
    $("button").click(function(){
        var selectedStyle = [];
        var selectedTechnique = [];

        $.each($("input[name='category-style']:checked"), function(){            
            selectedStyle.push($(this).val());
        });

        $.each($("input[name='category-technique']:checked"), function(){            
            selectedTechnique.push($(this).val());
        });

        console.log("Selected Style are: " + selectedStyle.join(", "));
        console.log("Selected Tecniques are: " + selectedTechnique.join(", "));

        console.log("Selected Price is: " + PriceMin);
        console.log("Selected Price is: " + PriceMax);

    });

});
