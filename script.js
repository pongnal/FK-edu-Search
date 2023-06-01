function previewProfilePicture(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    const profilePicturePreview = document.getElementById('profilePicturePreview');
  
    reader.onload = function (e) {
      profilePicturePreview.style.backgroundImage = `url(${e.target.result})`;
    }
  
    reader.readAsDataURL(file);
  }
  
  const profileForm = document.getElementById('profileForm');
  profileForm.addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Retrieve form data
    const formData = new FormData(profileForm);
    const username = formData.get('username');
    const password = formData.get('password');
    const confirmPassword = formData.get('confirmPassword');
    const academicStatus = formData.get('academicStatus');
    const email = formData.get('email');
    const researchArea = formData.get('researchArea');
    const profilePicture = document.getElementById('profilePicture').files[0];
  
    // Perform form validation and submit logic here
    // ...
  
    // Reset the form after submission if needed
    // profileForm.reset();
  });
  