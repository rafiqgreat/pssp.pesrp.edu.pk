<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo getUserlang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PEIMA</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS for Main Color and Urdu Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header with Two Logos -->
    <header class="w-full bg-gray-300 text-dark px-3 py-2">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="<?= base_url('assets/images/Logo_1.png'); ?>" alt="PEIMA Logo" class="h-20" />
                <div class="flex flex-col">
                    <h3 class="text-xl font-bold text-dark">Punjab Education Initiatives Management Authority</h3>
                    <h4 class="text-lg text-dark">Public Schools Support Program Spell-11</h4>
                </div>
            </div>
            <div class="space-x-2">
                <a href="<?= base_url('login'); ?>" class="p-2 cursor-pointer bg-white rounded-lg p-4 text-dark font-semibold">Login</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto mt-1 md:mt-1 px-2 py-4">
        <!-- Login Form Container -->
        <div class="grid grid-cols-1 md:grid-cols-[40%_60%] gap-8">

            <!-- Left Side: Image/Information -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Registration Instructions</h2>
                    <p class="text-gray-700 text-center text-red-600 urdufont-right"> درخواست جمع کرانے سے پہلے اس کی شرائط و ضوابط کو پڑھنا لازمی ہے۔</p>
                    <div class="flex items-center justify-center gap-4 mt-4">
                        <a href="#" class="text-blue-500 hover:underline">Instruction for <br /> Application Portal</a> | 
                        <a href="#" class="text-blue-500 hover:underline urdufont-right">ہدایات برائے <br /> درخواست دھندگان</a>
                    </div>

                    <h3 class="text-md font-semibold text-gray-700 mt-6">Select Registration Type</h3>
                    <p class="text-gray-600 mb-2">Choose the category that best describes you:</p>
                    <div class="flex flex-col gap-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="Young Entrepreneur">
                            <span class="ml-2 text-gray-700">Young Entrepreneur</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="Individual">
                            <span class="ml-2 text-gray-700">Individual</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="Ed Tech Firm">
                            <span class="ml-2 text-gray-700">Ed Tech Firm</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="Education Chain">
                            <span class="ml-2 text-gray-700">Education Chain</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="NGOs">
                            <span class="ml-2 text-gray-700">NGOs</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="PEF/PEIMA Partner">
                            <span class="ml-2 text-gray-700">PEF/PEIMA Partner</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType"
                                value="Private School">
                            <span class="ml-2 text-gray-700">Private School</span>
                        </label>
                    </div>
                </div>
            <!-- Right Side: Login Form -->
            <div class="bg-white shadow-lg rounded-lg p-10 md:pr-12 pl-12 pt-4 pb-4 items-center">
                <div class="" name="young_entrepreneur" id="young_entrepreneur">Young Entrepreneur</div>  
                <div class="" name="individual" id="individual">Individual</div>
                <div class="" name="ed_tech_firm" id="ed_tech_firm">Ed Tech Firm</div>
                <div class="" name="education_chain" id="education_chain">Education Chain</div>
                <div class="" name="ngos" id="ngos">NGOs</div>
                <div class="" name="pef_peima_partner" id="pef_peima_partner">PEF/PEIMA Partner</div>
                <div class="" name="private_school" id="private_school">Private School</div>
            </div>
<!--            ==========================-->        
		</div>
        <div class="grid grid-cols-1 mt-10">
            <div class="bg-white shadow-lg rounded-lg p-10 items-center">
                    <h1 class="text-3xl text-primary font-bold mb-6">Registration</h1>
                    <form id="registrationForm" class="space-y-4">
                        <!-- Common Fields (Always Shown) -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="fullName">Full Name (As Per CNIC):</label>
                            <input type="text" class="input-field form-control" id="fullName" name="fullName" placeholder="Full Name" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address:</label>
                            <input type="email" class="input-field form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="mobileNumber">Mobile Number:</label>
                            <input type="tel" class="input-field form-control" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="cnic">CNIC (without dashes):</label>
                            <input type="text" class="input-field form-control" id="cnic" name="cnic" placeholder="CNIC" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                            <input type="password" class="input-field form-control" id="password" name="password" placeholder="Password" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmPassword">Retype Password:</label>
                            <input type="password" class="input-field form-control" id="confirmPassword" name="confirmPassword" placeholder="Retype Password" required>
                        </div>
                        <button type="submit" class="btn btn-flat btn-primary">Submit</button>
                    </form>
            </div>
		</div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-8">
        <p class="text-gray-600">© 2024 PEIMA</p>
    </footer>
</body>



<?php /*?><?php include 'includes/header.php' ?><?php */?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
		const radioButtons = document.querySelectorAll('input[name="registrationType"]');
		const dynamicImage = document.getElementById('dynamicImage');
		const imageContainer = document.querySelector('.image-container');
		const formSections = document.querySelectorAll('.form-section');
	
		// Hide all form sections initially
		formSections.forEach(section => section.style.display = 'none');
	
		function loadImage(imagePath) {
			return new Promise((resolve, reject) => {
				const img = new Image();
				img.onload = () => resolve(img);
				img.onerror = () => reject(new Error(`Failed to load image at ${imagePath}`));
				img.src = imagePath;
			});
		}
	
		function handleRegistrationTypeChange(selectedType) {
			// Hide all form sections
			formSections.forEach(section => section.style.display = 'none');
	
			// Show only the selected section
			const sectionToShow = document.querySelector(`.form-section[data-type="${selectedType}"]`);
			if (sectionToShow) {
				sectionToShow.style.display = 'block';
			}
	
			// Update the image based on selection
			let imagePath;
			switch (selectedType) {
				case 'Young Entrepreneur':
					imagePath = './images/Young_Enterpenur.png';
					break;
				case 'Individual':
					imagePath = './images/Individual.png';
					break;
				case 'Ed Tech Firm':
					imagePath = './images/EdTech.png';
					break;
				case 'Education Chain':
					imagePath = './images/Educational_Chain.png';
					break;
				case 'NGOs':
					imagePath = './images/Ngo.png';
					break;
				case 'PEF/PEIMA Partner':
					imagePath = './images/Pef_Partner.png';
					break;
				case 'Private School':
					imagePath = './images/Private_School_Owner.png';
					break;
				default:
					imagePath = '';
			}
	
			// Load and update image
			if (imagePath) {
				loadImage(imagePath)
					.then(img => {
						dynamicImage.src = img.src;
					})
					.catch(error => {
						console.error(error);
						dynamicImage.src = ''; // Clear if loading fails
					});
			}
		}
	
		// Select "Young Entrepreneur" by default on page load
		const defaultRadio = document.querySelector('input[name="registrationType"][value="Young Entrepreneur"]');
		if (defaultRadio) {
			defaultRadio.checked = true; // Ensure it's selected
			handleRegistrationTypeChange(defaultRadio.value);
		}
	
		// Event listener for registration type changes
		radioButtons.forEach(radio => {
			radio.addEventListener('change', function () {
				handleRegistrationTypeChange(this.value);
			});
		});
	});



    </script>
<?php include 'includes/footer.php' ?>
