unction function() {}etchUserData() {
  console.log('Fetching user data...'); // This should appear in the console when you click the icon

  var xhr = new XMLHttpRequest();

  // replace 'userId' with your actual user id
  xhr.open('GET', 'fetch_user.php?id=' + id, true);

  xhr.onload = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var userData = JSON.parse(xhr.responseText);

      var popupContent = `
        <p>Name: ${userData.name}</p>
        <p>Email: ${userData.email}</p>
        // Add more fields as needed
      `;

      document.getElementById('userPopup').innerHTML = popupContent;
      document.getElementById('userPopup').style.display = 'block';
    } else {
      console.error(xhr.responseText);
    }
  };

  xhr.send();
}
