function submitForm() {
    var formData = new FormData(document.getElementById('signupForm'));

    fetch('form-process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display a message (optional)
        alert(data);

        // Fetch and display updated data
        fetchUserData();
    })
    .catch(error => {
        alert('Error: ' + error);
    });
}

function fetchUserData() {
    fetch('form-process.php')  // Use the same PHP file for fetching
    .then(response => response.text())
    .then(data => {
        // Update the content of the userData div
        document.getElementById('userData').innerHTML = data;
    })
    .catch(error => {
        alert('Error: ' + error);
    });
}
