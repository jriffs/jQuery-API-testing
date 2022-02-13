$(function() {
   const searchBar = $('#search-bar');
   const result = $('#search-result');
   const resultUl = $('#search-result-ul');
   const usernames = [];

   loadUsers();

   searchBar.on('keyup', function() {
        
      const searchString = $(this).val().toLowerCase();
      
      const filteredUsers = usernames.filter((users) => {
        return(
            users.toLowerCase().includes(searchString)
        );
      });

      if (searchBar.val() === "") {
          result.html('No input');
      }else if (filteredUsers.length == 0) {
          "<li>No user with that name!!</li>"
      } else {
        resultUl.html(
            "<li>" +filteredUsers+"</li>"
        );
      }
   });

    function loadUsers() {
        $.ajax({
            type: "POST",
            url: "loadUsers.php",
            dataType: "JSON",
            success: function(users) {
                users.forEach(user => {
                    usernames.push(user.name);
                });
            }
        });
    }


    


});