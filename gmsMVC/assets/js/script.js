document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-button');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(content => {
                if (content.id === targetTab) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none'; 
                }
            });
            this.classList.add('active');
        });
    });

    var imgContainer = document.getElementById("imgContainer");
    var fileInput = document.getElementById("file-input");

    imgContainer.addEventListener("click", function() {
        fileInput.click();
    });

    fileInput.addEventListener("change", function() {
        var file = fileInput.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("userImage").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});