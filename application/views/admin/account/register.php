<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
        <div class="grid grid-cols-1 md:grid-cols-[100%] gap-8">
            <!-- Left Side: Image/Information -->
            <?php echo form_open('/login/register_user', ['method' => 'POST', 'autocomplete' => 'off', 'class' => 'space-y-4']); ?>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="row col-12">
                    <div class="col-6 text-lg font-semibold text-gray-800 mb-4">Registration Instructions (<a href="#" class="text-blue-500 hover:underline">Instruction for Application Portal</a>)</div>
                    <div class="col-6 text-gray-700 text-center text-red-600 urdufont-right">درخواست جمع کرانے سے پہلے اس کی شرائط و ضوابط کو پڑھنا لازمی ہے۔ (<a href="#" class="text-blue-500 hover:underline urdufont-right">ہدایات برائے درخواست دھندگان</a>)</div>
                </div>
                <h3 class="text-md font-semibold text-gray-700">Select Registration Type</h3>
                <div class="flex flex-wrap gap-2 mt-2 ml-4">
                    <label class="flex items-center">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="2" checked>
                        <span class="ml-2 text-gray-700">Young Entrepreneur</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="3">
                        <span class="ml-2 text-gray-700">Individual</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="4">
                        <span class="ml-2 text-gray-700">Ed Tech Firm</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="5">
                        <span class="ml-2 text-gray-700">Education Chain</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="6">
                        <span class="ml-2 text-gray-700">NGOs</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="7">
                        <span class="ml-2 text-gray-700">PEF/PEIMA Partner</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input type="radio" class="form-radio h-4 w-4 text-indigo-600" name="registrationType" value="8">
                        <span class="ml-2 text-gray-700">Private School</span>
                    </label>
                </div>
                <br />
                <hr />
                <div class="m-2 section" id="2" style="font-size:14px">
                    1) A group of (03) three persons (friends/family), irrespective of gender (one of them to be the lead applicant) may apply for one school by giving preferred choice of 07 suitable schools from the advertised list of schools;<br />
                    2) Lead applicant must possess at least 03 years post qualification experience. Certificate should be as per given format in this document at Appendix-B;<br />
                    3) One person can apply in a single young entrepreneurs’ group only;<br />
                    4) Lead applicant must be an MA/MSc/BS degree holder (16 years of Education), while other two applicants must be at least BA/BSc degree holders (14 years of Education);<br />
                    5) The maximum age limit for each group member is 40 years. The last date for submission of online applications shall be taken as the cut-off date for the calculation of the age of the applicants; <br />
                    6) All group members are required to submit legible and valid police character certificate along with the application (mere receipt/ application form for issuance of character certificate is not acceptable);<br />
                    7) In case any of the group members is found to be blacklisted/ convicted or has criminal record, the candidature of whole group shall be rejected; <br />
                    8) Submission of fake/forged/fabricated documents by any group member shall render the entire group ineligible for the current as well as any subsequent Program of the Government and may result in initiation of criminal proceedings;<br />
                    9) Serving employees of Government (includes but not limited to departments, attached departments, autonomous bodies, semi Government entities) ARE NOT ELIGIBLE TO APPLY;<br />
                    10) Licensee of PSRP Phase-I are NOT ELIGIBLE to apply under PSRP Phase-II, (including lead or support partners);<br />
                    11) Licensees who had been allocated school in PSRP Phase-I but they had refused to take over / functionalize school are NOT ELIGIBLE.</div>
                <div class="m-2 section" id="3" style="font-size:14px">
                    1) Individual having 16 year of education can apply for one school by giving choice of 07 preferred schools from the advertised list of schools;<br />
                    2) Applicant must possess at least 07 years of post-qualification experience. The experience certificate must be submitted as per given format at Appendix-B;<br />
                    3) The maximum age limit for applicant(s) is 65 years. The last date for submission of online application shall be taken as the cut-off date for calculation of the age; <br />
                    4) Application of blacklisted / convicted individual having criminal record shall be rejected;<br />
                    5) The applicant is required to submit legible and valid police character certificate along with the application (mere receipt/ application form for issuance of character certificate is not acceptable);<br />
                    6) Submission of fake/forged/fabricated documents by applicant shall render the applicant ineligible for the current as well as any subsequent Program of the Government and may also result in initiation of criminal proceedings;<br />
                    7) Serving employees of Government (includes but not limited to departments, attached departments, autonomous bodies, semi Government entities) ARE NOT ELIGIBLE TO APPLY;<br />
                    8) Licensee of PSRP Phase-I are NOT ELIGIBLE to apply under PSRP Phase-II;<br />
                    9) Licensee who had been allocated school in PSRP Phase-I but they had refused to take over / functionalize school are NOT ELIGIBLE.
                </div>
                <div class="m-2 section" id="4" style="font-size:14px">
                    1) Ed-Tech Firm must be registered with Punjab /Federal Government (including SECP/Registrar of Firms). The Firm having international footprint will be given preference;<br />
                    2) The firm must have at least three years’ experience in the field of Ed-Tech in Education Sector;<br />
                    3) The firm must have provided IT infrastructure, software/hardware in at least five formal educational institutions to enhance learning outcomes;<br />
                    4) The Ed-Tech Firm must apply for a cluster of at least 10 schools in a district (no limit for maximum schools.);<br />
                    5) Ed-Tech Firm may apply for schools in any tehsil/ district. However, the allocation of schools in any tehsil/ district to any Ed-Tech Firm/ Educational Chain/ NGO/ CSO shall be determined by the Match Making Committee on the basis of merit, availability of schools, location of schools, enrollment in schools and existing operations etc. of that entity. While making allocation of schools to a specific organization, the Match Making Committee may also consider the financial, operational and administrative capacity of that organization which must be established through documentary evidences provided along with the application; <br />
                    6) Firms are required to provide proof of their financial soundness in shape of audited report of last 2 years;<br />
                    7) The firms are required to furnish an affidavit from its focal person that firm has not been blacklisted by the Government of Punjab/Pakistan;<br />
                    8) Submission of fake/forged/fabricated documents shall render the firm ineligible for the current as well as any subsequent programs of the Government and may also result in initiation of criminal proceedings;<br />
                    9) After successful completion of initial scrutiny, the firm shall be required to give a detailed presentation about its intended plans/proposals/ initiatives/ interventions/ improvements about the schools it intends to manage;<br />
                    10) Explicit approval of Board / CEO of Ed-Tech Firm for submission of application under PSRP Phase-II must be provided alongwith the application;<br />
                    11) Firms allocated schools in PSRP Phase-I but refused to take over / functionalize schools as a whole are NOT ELIGIBLE.<br />
                    12) Approval of Board of Ed-Tech Firm for nomination of focal person for PSRP Phase-II is required to be submitted alongwith the application;<br />
                </div>
                <div class="m-2 section" id="5" style="font-size:14px">
                    1) Educational Chain must be registered with Punjab /Federal Government (including SECP/Registrar of Firms);<br />
                    2) It must have at least five years of experience of working in Education Sector;<br />
                    3) Educational Chain must be operating at least 10 formal registered private schools/colleges;<br />
                    4) Educational Chain must apply for a cluster of at least 10 schools in a district (no limit for maximum schools);<br />
                    5) Educational Chain may apply for schools in any tehsil/ district. However, the allocation of schools in any tehsil/ district to any Ed-Tech Firm/ Educational Chain/ NGO/ CSO shall be determined by the Match Making Committee on the basis of merit, availability of schools, location of schools, enrollment in schools and existing operations etc. of that entity. While making allocation of schools to a specific organization, the Match Making Committee may also consider the financial, operational and administrative capacity of that organization which must be established through documentary evidences provided along with the application;<br />
                    6) The Educational Chain is required to furnish an affidavit by its focal person that Educational Chain has not been blacklisted by the Government of Punjab/Pakistan;<br />
                    7) Educational Chain is required to provide proof of its financial soundness in the shape of audited reports of last 03 years;<br />
                    8) Submission of fake/forged/fabricated documents shall render the educational chain ineligible for the current as well as any subsequent Program of the Government and may also result in initiation of criminal proceedings;<br />
                    9) After successful completion of initial scrutiny, the chain shall be required to give a detailed presentation about its intended plans/proposals/initiatives/ interventions/ improvements about the cluster of the schools it intends to manage; <br />
                    10) Explicit approval of Board / CEO of Educational Chain for submission of application under PSRP Phase-II must be provided alongwith the application;<br />
                    11) Educational Chain allocated schools in PSRP Phase-I but refused to take over / functionalize schools as a whole is NOT ELIGIBLE;<br />
                    12) Approval of Board of Educational Chain for nomination of focal person for PSRP Phase-II is required alongwith the application.<br />
                </div>
                <div class="m-2 section" id="6" style="font-size:14px">
                    1) NGO/ CSO must be registered with Punjab /Federal Government (including SECP/Registrar of Firms). The NGO/CSO registered with relevant charity commission will be given preference;<br />
                    2) Registered Non-Governmental Organizations (NGOs) and Civil Society Organizations (CSOs) must be working on non-commercial basis;<br />
                    3) Registered Non-Governmental Organizations (NGOs) and Civil Society Organizations (CSOs) having experience of at least 05 years in the Education Sector or Social Sector on non-commercial basis in Punjab/ Pakistan are eligible to apply;<br />
                    4) NGO/ CSO must apply for a cluster of at least 10 schools in a district (no limit for maximum schools);<br />
                    5) NGO / CSO is required to furnish an affidavit of focal person that NGO / CSO hasn’t been blacklisted by Government of Punjab/Pakistan;<br />
                    6) Submission of fake/forged/fabricated documents shall render the NGO/CSO ineligible for the current as well as any subsequent Program of the Government and may also result in initiation of criminal proceedings;<br />
                    7) NGO/ CSO may apply for schools in a particular tehsil/ district. However, the allocation of schools in any tehsil/ district to any Ed-Tech Firm/ Educational Chain/ NGO/ CSO shall be determined by the Match Making Committee on the basis of merit, availability of schools, location of schools, enrollment in schools and existing operations etc. of that entity. While making allocation of schools to a specific organization, the Match Making Committee may also consider the financial, operational and administrative capacity of that organization which must be established through documentary evidences provided along with the application;<br />
                    8) NGO/ CSO is required to give proof of its financial soundness in the shape of audited reports of last three years;<br />
                    9) After successful completion of initial scrutiny, the NGO / CSO shall be required to give a detailed presentation about its strength / capacity, intended plans proposals initiatives/interventions/improvements about the cluster of the schools it intends to manage;<br />
                    10) Explicit approval of Board of NGO / CSO for submission of application under PSRP Phase-II must be provided alongwith the application;<br />
                    11) Organizations allocated schools in PSRP Phase-I but refused to take over / functionalize schools as a whole are NOT ELIGIBLE;<br />
                    12) Approval of Board of NGO / CSO for nomination of focal person for PSRP Phase-II is required alongwith the application;<br />
                </div>
                <div class="m-2 section" id="7" style="font-size:14px">
                    1) PEF Partner/PEIMA Licensee must be in a valid contract with PEF/PEIMA for at least five (5) consecutive years. Length of term of contract shall be determined from the last date for submission of online application;<br />
                    2) PEF Partner/PEIMA Licensee School must have passed last three consecutive Quality Assurance Tests (QATs);<br />
                    3) PEF Partner/PEIMA Licensee school must have minimum 300 SIS reported enrollment. Enrollment shall be determined on the last date for submission of online application;<br />
                    4) The maximum age limit for school owner is 65 years. The last date for submission of online application shall be taken as the cut-off date for calculation of the age; <br />
                    5) PEF Partner must have valid registration certificate from DEA;<br />
                    6) PEF Partner/PEIMA Licensee having 16 year of education can apply for one school by giving choice of 07 preferred schools from the advertised list of schools;<br />
                    7) Submission of fake/forged/fabricated documents by applicant shall render the applicant ineligible for the current as well as any subsequent Program of the Government and may also result in initiation of criminal proceedings;<br />
                    8) The applicant is required to submit legible and valid police character certificate along with the application (mere receipt/ application form for issuance of character certificate is not acceptable);<br />
                    9) Application of blacklisted / convicted applicant having criminal record shall be rejected.
                </div>
                <div class="m-2 section" id="8" style="font-size:14px">
                    1) Applicant school must be registered with District Education Authority (DEA) for last 5 consecutive years and has valid registration certification till last date for submission of online application;<br />
                    2) Applicant having 16 year of education can apply for one school by giving choice of 07 preferred schools from the advertised list of schools;<br />
                    3) The applicant private school must have at least 300 enrolled students. The applicant shall provide students details as per given format at Appendix-C;<br />
                    4) The maximum age limit for school owner is 65 years. The last date for submission of online application shall be taken as the cut-off date for calculation of the age;<br />
                    5) Serving Government Employees (including but not limited to departments, attached departments, autonomous bodies and semi Government entities ARE NOT ELIGIBLE TO APPLY;<br />
                    6) Submission of fake/forged/fabricated documents by applicant shall render the applicant ineligible for the current as well as any subsequent Program of the Government and may also result in initiation of criminal proceedings;<br />
                    7) The applicant is required to submit legible and valid police character certificate along with the application (mere receipt/ application form for issuance of character certificate is not acceptable);<br />
                    8) Application of blacklisted / convicted applicant having criminal record shall be rejected;
                </div>
                <hr />
                <h1 class="text-3xl text-primary font-bold mb-6 mt-4">Registration</h1>

                <!-- Common Fields (Always Shown) -->
                <div class="row col-12">
                    <div class="col-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cnic">CNIC (without dashes):</label>
                        <input type="text" class="input-field form-control" id="cnic" name="cnic" placeholder="CNIC" required>
                    </div>
                    <div class="col-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fullName">Full Name (As Per CNIC):</label>
                        <input type="text" class="input-field form-control" id="fullName" name="fullName" placeholder="Full Name" required>
                    </div>
                    <div class="col-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address:</label>
                        <input type="email" class="input-field form-control" id="email" name="email" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="row col-12">
                    <div class="col-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="mobileNumber">Mobile Number:</label>
                        <input type="tel" class="input-field form-control" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number" required>
                    </div>
                    <div class="col-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                        <input type="password" class="input-field form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Re-type Password:</label>
                        <input type="password" class="input-field form-control" id="repassword" name="repassword" placeholder="Re-type Password" required>
                    </div>
                </div>
                <div class="row col-12 p-2"><button type="submit" class="btn btn-flat btn-primary">Submit</button></div>

            </div>
            <?php echo form_close(); ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-8">
        <p class="text-gray-600">© <?php echo date('Y'); ?> PEIMA</p>
    </footer>
</body>



<?php /*?><?php include 'includes/header.php' ?><?php */ ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll(".section"); // Get all divs
        const radioButtons = document.querySelectorAll("input[name='registrationType']"); // Get all radio buttons

        function showSection(selectedValue) {
            sections.forEach(section => {
                section.style.display = "none"; // Hide all sections
            });

            // Find and display the correct section based on the selected value
            const activeSection = document.getElementById(selectedValue);
            if (activeSection) {
                activeSection.style.display = "block"; // Show the selected section
            }
        }

        // Set default selection (first radio button)
        const defaultSelected = document.querySelector("input[name='registrationType']:checked");
        if (defaultSelected) {
            showSection(defaultSelected.value);
        }

        // Add event listener to each radio button
        radioButtons.forEach(radio => {
            radio.addEventListener("change", function() {
                showSection(this.value);
            });
        });
    });
</script>
<?php include 'includes/footer.php' ?>