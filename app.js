let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');
let countItem = items.length;
let itemActive = 0;

//event next click
if(next){
    next.onclick = function(){
        itemActive = itemActive + 1;
        if(itemActive >= countItem){
            itemActive = 0;
        }
        showslider();
    }
}

//event prev click
if(prev){
    prev.onclick = function(){
        itemActive = itemActive - 1;
        if(itemActive < 0){
            itemActive = countItem - 1;
        }
        showslider();
    }
}

//auto run slider
let refreshInterval = setInterval(()=>{
    if(next){
        next.click();
    }
    
}, 5000)
function showslider(){
    //remove the active class from the old item
    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove("active");
    thumbnailActiveOld.classList.remove("active");

    //activate the next item
    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');
    //clear auto run slider
    clearInterval(refreshInterval);
     // Set a new interval after user interaction
     refreshInterval = setInterval(() => {
        next.click();
    }, 5000);

}
//show the slider when clicking on the thumbnail
thumbnails.forEach((thumbnail , index) =>{
    thumbnail.addEventListener('click', ()=>{
        itemActive = index;
        showslider();
    })
})
// window.onscroll = function() {stickyNavbar()};

// var navbar = document.getElementById("navbar");
// var sticky = navbar.offsetTop;

// function stickyNavbar() {
//     if (window.pageYOffset >= sticky) {
//         navbar.classList.add("sticky");
//     } else {
//         navbar.classList.remove("sticky");
//     }
// }
//Active link
document.addEventListener("DOMContentLoaded", function () {
    // Get the current URL
    var currentUrl = window.location.pathname;

    // Get all anchor elements in the navigation
    var navLinks = document.querySelectorAll('.sections_menu a');
    
    console.log(navLinks);
    // Check each anchor's href attribute against the current URL
    navLinks.forEach(function (link) {
        var linkUrl = link.getAttribute('href');
        let url = currentUrl.slice(-linkUrl.length);

        // If the current URL contains the href value, add the 'active' class
        if (url === linkUrl) {
            link.classList.add('active-link');
            console.log(link);
        }
    });
});
//form pop up 

document.addEventListener("DOMContentLoaded", function () {
    var plusButtons = document.querySelectorAll('.plus-button');

    plusButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            var formNumber = index + 1; // Adding 1 to make it 1-based
            toggleForm(formNumber);
        });
    });

    function toggleForm(formNumber) {
        var form = document.getElementById('form' + formNumber);
        if (form) {
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'flex' : 'none';
        }
    }
});
// document.addEventListener("DOMContentLoaded", function () {
//     var closeButtons = document.querySelectorAll('.close-btn');
//     closeButtons.forEach(function (button, index) {
//         button.addEventListener('click', function () {
//             var formNumber = index + 1; // Adding 1 to make it 1-based
//             closeForm(formNumber);
//         });
//     });
// });

// function closeForm(formNumber) {
//     var form = document.getElementById('form' + formNumber);
//     var formElements = document.getElementById('form-' + formNumber).elements;
//     var formm = document.getElementById('form-' + formNumber);
    
//     if (form) {
        

//         form.style.display = 'none';

//     }
//     if (formm) {

//         changeStyle(formNumber)
//         // Iterate through each form element and reset its value
//         for (var i = 0; i < formm.elements.length; i++) {
//             var element = formm.elements[i];
            
//             // Reset the value for select elements
//             if (element.tagName === 'SELECT') {
//               element.selectedIndex = 0;
//               if(i!==0){element.disabled = true}
              
//             }
//           }
       

        

//     }
//     var storedFormData = localStorage.getItem(formNumber);
//     if (storedFormData) {
//         localStorage.removeItem(formNumber);
//       }

    
    
    
// }
// function changeStyle(formNumber) {
//     var div = document.getElementById('plus-button' + formNumber);
//     div.textContent = '+ Add a vehicle';

//     //     // Change background color
//     // div.style.backgroundColor = '#FFF0F3';

//     //     // Change text color
//     // div.style.color = '#03071E';
//     div.classList.remove('added-style');

//     // Add the new style class
//     div.classList.add('default-style');

  
  
    
//    }
//close the form and clear the data 
document.addEventListener("DOMContentLoaded", function () {
    var closeButtons = document.querySelectorAll('.close-btn');
    closeButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            var formNumber = index + 1; // Adding 1 to make it 1-based
            closeForm(formNumber);
            console.log("closing the form");
            console.log(submitedFormNb);

        });
    });
});

function closeForm(formNumber) {
    var form = document.getElementById('form' + formNumber);
    var formElements = document.getElementById('form-' + formNumber).elements;
    var formm = document.getElementById('form-' + formNumber);
    
    if (form) {
        

        form.style.display = 'none';

    }
    if (formm) {

        changeStyle(formNumber)
        
        // Iterate through each form element and reset its value
        for (var i = 0; i < formm.elements.length; i++) {
            var element = formm.elements[i];
            
            // Reset the value for select elements
            if (element.tagName === 'SELECT') {
              element.selectedIndex = 0;
              if(i!==0){element.disabled = true}
              
            }
          }
       

          

    }
    var storedFormData = localStorage.getItem("is_submited"+formNumber);
    if (storedFormData) {
        localStorage.removeItem("is_submited"+formNumber);
        submitedFormNb--;
        localStorage.setItem("submitedFormNb",submitedFormNb );
        deleteDataInTable(formNumber) ;

      }
    
    
    
    
}
function changeStyle(formNumber) {
    var div = document.getElementById('plus-button' + formNumber);
    div.textContent = '+ Add a vehicle';

    //     // Change background color
    // div.style.backgroundColor = '#FFF0F3';

    //     // Change text color
    // div.style.color = '#03071E';
    div.classList.remove('added-style');

    // Add the new style class
    div.classList.add('default-style');

  
  
    
   }
   function deleteDataInTable(formId) {
    var responseArea = document.getElementById('responseArea');
    
    // Check if the table exists
    var tableDiv = responseArea.querySelector('.table');
    if (!tableDiv) {
        console.log("Table doesn't exist.");
        return;
    }

    // Delete <th> with id=formId
    var thElement = tableDiv.querySelector('th[id="' + formId + '"]');
    if (thElement) {
        thElement.remove();
    }

    // Delete <td> with id starting with formId
    var tdElements = tableDiv.querySelectorAll('td[id^="' + formId + '"]');
    tdElements.forEach(function(tdElement) {
        tdElement.remove();
    });

    // Check if the table is empty and remove it
    var nbform = localStorage.getItem("submitedFormNb");
    if (nbform == 0) {
        tableDiv.remove(); // Remove the table if it's empty
    }
}

//logout link
document.addEventListener("DOMContentLoaded", function() {
    // Add click event to the logout link
    let logoutLink = document.getElementById('logoutLink');
    if(logoutLink){
        document.getElementById('logoutLink').addEventListener('click', function () {
            // Submit the hidden form
            document.getElementById('logoutForm').submit();
        });
    }
    
});

document.addEventListener("DOMContentLoaded", function() {
    // Add click event to the logout link
    let profileImg = document.getElementById('profile_img');
    if(profileImg){
        document.getElementById('profile_img').addEventListener('click', function () {
            // Submit the hidden form
            let menu = document.getElementById('sub_menu');
            menu.classList.toggle('open-menu');
        });
    }
    
});

var brandsButton = document.getElementById('brandsButton');
var vehiclesButton = document.getElementById('vehiclesButton');

if(brandsButton){
    brandsButton.addEventListener('click', showBrands);
    
}
if(vehiclesButton){
    vehiclesButton.addEventListener('click', showVehicles);
   
}

    function showBrands() {
        document.getElementById('brandsSection').style.display = 'block';
        document.getElementById('vehiclesSection').style.display = 'none';
        brandsButton.classList.add('active-btn');
        vehiclesButton.classList.remove('active-btn');
    }

    function showVehicles() {
        document.getElementById('brandsSection').style.display = 'none';
        document.getElementById('vehiclesSection').style.display = 'block';
        vehiclesButton.classList.add('active-btn');
        brandsButton.classList.remove('active-btn');
    }

    $('.example').DataTable({
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
     
                    // Create select element and listener
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = DataTable.util.escapeRegex($(this).val());
     
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
     
                    // Add list of options
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + '</option>'
                            );
                        });
                });
        }
    });


    var all = document.getElementById('all');
    var add = document.getElementById('add');
    
    if(all){
        all.addEventListener('click', showAllSection);
        
    }
    if(add){
        add.addEventListener('click', showAddSection);
       
    }
    
        function showAllSection() {
            document.getElementById('all-section').style.display = 'block';
            document.getElementById('add-section').style.display = 'none';
            all.classList.add('active-menu');
            add.classList.remove('active-menu');
        }
    
        function showAddSection() {
            document.getElementById('all-section').style.display = 'none';
            document.getElementById('add-section').style.display = 'flex';
            add.classList.add('active-menu');
            all.classList.remove('active-menu');
        }


let deleteBtns = document.querySelectorAll('.delete');
console.log(deleteBtns);
let yesBtns = document.querySelectorAll('.yes');
let noBtns = document.querySelectorAll('.no');
let closeBtns = document.querySelectorAll('.close-icon')
let editBtns = document.querySelectorAll('.edit');
console.log(editBtns);

for (var i = 0; i < deleteBtns.length; i++) {
    let deleteBtn = deleteBtns[i];
    let yesBtn = yesBtns[i];
    let noBtn = noBtns[i];
    let closeBtn = closeBtns[i];
    let editBtn = editBtns[i];
    let deleteId = deleteBtn.id;
    

    deleteBtn.addEventListener('click', function () {
        showPopup(deleteId);
    });
    yesBtn.addEventListener('click', function () {
        submitForm(deleteId);
        yesBtn.href="/AutoClash/admin_users";
    });
    noBtn.addEventListener('click', function () {
        closePopup(deleteId);
    });
    // closeBtn.addEventListener('click', function () {
    //     closePopup(deleteId);
    // });
    editBtn.addEventListener('click', function () {
        submitEditForm(deleteId);
        
        showAddSection();
    });
}

function showPopup(deleteId){
    let popup = document.getElementById("deletePopup"+deleteId);
    if(popup){
        console.log('yes');
        popup.style.display='flex';
    }else{
        console.log("deletePopup"+deleteId);
    }

}
function submitForm(deleteId){
    let form = document.getElementById('deleteForm'+deleteId);
    console.log('deleteForm'+deleteId);
    if(form){
        console.log("submit");
        form.submit();


    }
}
function submitEditForm(deleteId){
    let form = document.getElementById('editForm'+deleteId);
    console.log(form);
    if(form){
        console.log("submit");
        form.submit();


    }
}
function closePopup(deleteId){
    let popup = document.getElementById("deletePopup"+deleteId);
    if(popup){
        popup.style.display='none';

    }

}