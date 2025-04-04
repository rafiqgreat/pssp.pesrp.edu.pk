<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* Custom Font */
      @font-face {
        font-family: "Jameel Noori Nastaleeq";
        src: url("./fonts/Jameel Noori Nastaleeq Kasheeda.ttf")
          format("truetype");
      }
      /* Add to your existing CSS */

      /* Dotted Borders for Tables */
      .dotted-border {
        border: 1px dotted #666;
      }

      .dotted-table-border {
        border: 1px dotted #666;
        border-collapse: collapse;
      }

      .dotted-table-border td,
      .dotted-table-border th {
        border: 1px dotted #666;
      }

      /* Responsive Design */
      .table-container {
        overflow-x: auto;
        width: 100%;
      }

      /* Add to your existing CSS */

      /* Dotted Borders for Tables */
      .dotted-border {
        border: 1px dotted #666;
      }

      .dotted-table-border {
        border: 1px dotted #666;
        border-collapse: collapse;
      }

      .dotted-table-border td,
      .dotted-table-border th {
        border: 1px dotted #666;
      }

      /* Responsive Design */
      .table-container {
        overflow-x: auto;
        width: 100%;
      }
      .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
      }

      .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        overflow-y: auto;
        max-height: 80vh;
        position: relative;
      }

      .popup-close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.5rem;
        cursor: pointer;
        color: gray;
      }

      .popup-close:hover {
        color: black;
      }
      .urdu-text {
        font-family: "Jameel Noori Nastaleeq", serif;
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
      }

      /* Dotted Borders for Tables */
      .dotted-border {
        border: 1px dotted #666;
      }

      .dotted-table-border {
        border: 1px dotted #666;
        border-collapse: collapse;
      }

      .dotted-table-border td,
      .dotted-table-border th {
        border: 1px dotted #666;
      }

      /* Responsive Design */
      .table-container {
        overflow-x: auto;
        width: 100%;
      }

      @media (max-width: 768px) {
        .flex-col-on-mobile {
          flex-direction: column;
        }

        .w-full-on-mobile {
          width: 100%;
        }

        .text-center-on-mobile {
          text-align: center;
        }

        .grid-cols-1-on-mobile {
          grid-template-columns: 1fr;
        }

        .sidebar {
          width: 100%;
          margin: 0;
          border-radius: 0;
        }

        .main-container {
          width: 100%;
          padding: 4px;
        }

        .header-container {
          flex-direction: column;
          align-items: center;
          padding: 10px;
        }

        .header-container img {
          margin: 10px 0;
        }
      }
      .bg-blue-600 {
        background-color: #1a365d !important;
        /* color: white; */
      }
      .bg-blue-700 {
        background-color: #2c5282 !important;
        /* color: white; */
      }
      /* Popup Styles */
      .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
      }

      .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        overflow-y: auto;
        /* Enables scrolling if content is too long */
        max-height: 80vh;
        /* Limits the popup height to 80% of the viewport */
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <!-- popup -->
    <div id="eligibilityPopup" class="popup hidden">
      <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">×</span>
        <h2 class="text-2xl font-bold mb-4">
          Young Entrepreneur Group Eligibility Criteria Checklist
        </h2>
        <p class="mb-4">
          Please answer the following questions to determine your eligibility.
          All questions must be answered truthfully.
        </p>
        <form id="eligibilityForm">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              1. Is your group comprised of exactly three persons
              (friends/family)?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="group_size"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="group_size"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              2. Does the lead applicant possess at least 3 years of
              post-qualification experience, with a certificate as per
              Appendix-B?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="lead_experience"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="lead_experience"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              3. Are you only applying in a single young entrepreneurs’ group?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="single_group"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="single_group"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              4. Does the lead applicant hold at least an MA/MSc/BS degree (16
              years of Education), and the other two applicants at least a
              BA/BSc degree (14 years of Education)?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="education_level"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="education_level"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              5. Is the age of each group member 40 years or below as of the
              last date for submission of online applications?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="age_limit"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="age_limit"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              6. Have all group members submitted a legible and valid police
              character certificate?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="police_certificate"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="police_certificate"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              7. To the best of your knowledge, is any member of the group
              blacklisted, convicted, or has a criminal record?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="criminal_record"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="criminal_record"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              8. Have all group members submitted fake, forged, or fabricated
              documents?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="forged_documents"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="forged_documents"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              9. Are any of the group members serving employees of the
              Government?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="govt_employee"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="govt_employee"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              10. Are any of the group members licensees of PSRP Phase-I?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="psrp_licensee"
                  value="no"
                  required
                />
                <span class="ml-2 text-gray-700">No</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="psrp_licensee"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              11. Were any of the group members allocated a school in PSRP
              Phase-I but refused to take over / functionalize the school?
            </label>
            <div class="mt-2">
              <label class="inline-flex items-center mr-4">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="psrp_refusal"
                  value="no"
                  required
                />

                <span class="ml-2 text-gray-700">No</span>
              </label>
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  class="form-radio h-5 w-5 text-blue-600"
                  name="psrp_refusal"
                  value="yes"
                  required
                />
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
            </div>
          </div>
          <button
            type="button"
            onclick="validateEligibility()"
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none"
          >
            Submit Eligibility
          </button>
        </form>
      </div>
    </div>

    <!-- Header -->
    <header class="w-full flex bg-gray-300 text-dark justify-start px-3 p-2">
      <div
        class="container flex justify-start gap-2 w-[80%] mx-auto header-container"
      >
        <img src="images/Logo_1.png" alt="Logo 1" class="h-20" />
        <div class="flex flex-col items-start justify-center">
          <h3 class="text-center font-bold text-dark text-2xl">
            Punjab Education Initiatives Management Authority
          </h3>
          <h4 class="text-center font-bold text-dark text-xl">
            Public Schools Support Program Spell-11
          </h4>
        </div>
      </div>
      <div class="flex items-center pr-5">
        <div class="flex items-center">
          <img
            src="https://th.bing.com/th/id/OIP.awAiMS1BCAQ2xS2lcdXGlwHaHH?rs=1&pid=ImgDetMain"
            alt="User Image"
            class="cursor-pointer rounded-full h-10 w-10"
          />
          <span class="ml-2 text-dark font-semibold">Username</span>
        </div>
      </div>
    </header>

    <!-- Bar Line -->
    <div class="w-full p-4 bg-black">
      <h1 class="text-3xl font-bold text-white pl-10">Young Entrepreneur</h1>
    </div>

    <!-- Main Content -->
    <div class="flex h-screen">
      <!-- Left Sidebar -->

      <!-- Application Form-->
      <div class="w-100 p-8 main-container">
        <div class="w-full my-5 p-2 bg-gray-300">
          <h1 class="text-sm ml-10 font-bold text-black">
            Home / Application Form
          </h1>
        </div>
        <h1 class="text-3xl font-bold mb-6">Application Form</h1>
        <p class="mt-2 mb-5 text-lg font-bold text-red-500">
          Caution: You have to complete a Tab Before Going to Next One
        </p>
        <!-- Lead Applicant Accordion -->
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
          <button
            onclick="toggleAccordion('leadApplicantDetails', 'leadApplicantIcon')"
            class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
          >
            <span>Lead Applicant Details</span>
            <svg
              id="leadApplicantIcon"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 transform transition-transform"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div
            id="leadApplicantDetails"
            class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm"
          >
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Full Name (as per CNIC)</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Father / Husband Name</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >District</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select District</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Tehsil</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >District of Domicile</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select District</option>
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >CNIC (Without Dashes)</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Date of Birth</label
                >
                <input
                  type="date"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Gender</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Marital Status</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Mobile (WhatsApp)</label
                >
                <input
                  type="tel"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Telephone (Mobile)</label
                >
                <input
                  type="tel"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-md">
              Save
            </button>
          </div>
        </div>

        <!-- Support Applicant Accordion -->
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
          <button
            onclick="toggleAccordion('supportApplicantDetails', 'supportApplicantIcon')"
            class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
          >
            <span>Support Applicant Details (1)</span>
            <svg
              id="supportApplicantIcon"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 transform transition-transform"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div
            id="supportApplicantDetails"
            class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm"
          >
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Support Applicant Full Name (as per CNIC)</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Father / Husband Name</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >District</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select District</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Tehsil</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >District of Domicile</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select District</option>
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >CNIC (Without Dashes)</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Date of Birth</label
                >
                <input
                  type="date"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Gender</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Marital Status</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Mobile (WhatsApp)</label
                >
                <input
                  type="tel"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Telephone (Mobile)</label
                >
                <input
                  type="tel"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-md">
              Save
            </button>
          </div>
        </div>
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
          <button
            onclick="toggleAccordion('supportApplicantDetails', 'supportApplicantIcon')"
            class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
          >
            <span>Support Applicant Details (2)</span>
            <svg
              id="supportApplicantIcon"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 transform transition-transform"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div
            id="supportApplicantDetails"
            class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm"
          >
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Support Applicant Full Name (as per CNIC)</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Father / Husband Name</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >District</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select District</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Tehsil</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >District of Domicile</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="">Select District</option>
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >CNIC (Without Dashes)</label
                >
                <input
                  type="text"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Date of Birth</label
                >
                <input
                  type="date"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Gender</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Marital Status</label
                >
                <select
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                >
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Mobile (WhatsApp)</label
                >
                <input
                  type="tel"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700"
                  >Telephone (Mobile)</label
                >
                <input
                  type="tel"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-md">
              Save
            </button>
          </div>
        </div>

        <!-- Qualification Accordion -->
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
          <button
            onclick="toggleAccordion('qualificationDetails', 'qualificationIcon')"
            class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
          >
            <span>Qualification</span>
            <svg
              id="qualificationIcon"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 transform transition-transform"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div
            id="qualificationDetails"
            class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm dotted-border"
          >
            <div class="mt-6 table-container">
              <table
                id="qualificationTable"
                class="min-w-full bg-white dotted-table-border"
              >
                <thead>
                  <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b dotted-border">Applicant</th>
                    <th class="py-2 px-4 border-b dotted-border">Degree</th>
                    <th class="py-2 px-4 border-b dotted-border">
                      Institution
                    </th>
                    <th class="py-2 px-4 border-b dotted-border">Type</th>
                    <th class="py-2 px-4 border-b dotted-border">Percentage</th>
                    <th class="py-2 px-4 border-b dotted-border">From</th>
                    <th class="py-2 px-4 border-b dotted-border">To</th>
                    <th class="py-2 px-4 border-b dotted-border">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="inputRow">
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="applicant"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="Applicant1">Applicant 1</option>
                        <option value="Applicant2">Applicant 2</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="degree"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="BSc">Bachelor of Science</option>
                        <option value="MSc">Master of Science</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="institution"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="Inst1">Institution 1</option>
                        <option value="Inst2">Institution 2</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="type"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="Regular">Regular</option>
                        <option value="Private">Private</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="percentage"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="from"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="2020-01-01">2020-01-01</option>
                        <option value="2021-01-01">2021-01-01</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="to"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="2022-01-01">2022-01-01</option>
                        <option value="2023-01-01">2023-01-01</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <button
                        onclick="addQualification()"
                        class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                      >
                        Add
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button
                onclick="saveQualifications()"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
              >
                Save
              </button>
            </div>
          </div>
        </div>

        <!-- Experience Details Accordion -->
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
          <button
            onclick="toggleAccordion('experienceDetails', 'experienceIcon')"
            class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
          >
            <span>Experience Details</span>
            <svg
              id="experienceIcon"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 transform transition-transform"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div
            id="experienceDetails"
            class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm dotted-border"
          >
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700"
                >Accumulative / Total Experience (in years)</label
              >
              <select
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
              >
                <option value="1">1 Year</option>
                <option value="2">2 Years</option>
              </select>
            </div>
            <div class="mt-6 table-container">
              <table
                id="experienceTable"
                class="min-w-full bg-white dotted-table-border"
              >
                <thead>
                  <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b dotted-border">Sr No.</th>
                    <th class="py-2 px-4 border-b dotted-border">Applicant</th>
                    <th class="py-2 px-4 border-b dotted-border">
                      Name of Employer
                    </th>
                    <th class="py-2 px-4 border-b dotted-border">
                      Designation
                    </th>
                    <th class="py-2 px-4 border-b dotted-border">From</th>
                    <th class="py-2 px-4 border-b dotted-border">To</th>
                    <th class="py-2 px-4 border-b dotted-border">
                      Exp. in Years
                    </th>
                    <th class="py-2 px-4 border-b dotted-border">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="inputRowExperience">
                    <td class="py-2 px-4 border-b dotted-border"></td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="applicantExperience"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="Applicant1">Applicant 1</option>
                        <option value="Applicant2">Applicant 2</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="employer"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="Employer1">Employer 1</option>
                        <option value="Employer2">Employer 2</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="designation"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="Manager">Manager</option>
                        <option value="Engineer">Engineer</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="fromExperience"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="2020-01-01">2020-01-01</option>
                        <option value="2021-01-01">2021-01-01</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="toExperience"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="2022-01-01">2022-01-01</option>
                        <option value="2023-01-01">2023-01-01</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <select
                        id="expYears"
                        class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                      >
                        <option value="1">1 Year</option>
                        <option value="2">2 Years</option>
                      </select>
                    </td>
                    <td class="py-2 px-4 border-b dotted-border">
                      <button
                        onclick="addExperience()"
                        class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                      >
                        Add
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Schools Accordion -->
        <!-- <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
                <button
                    onclick="toggleAccordion('schoolDetails', 'schoolIcon')"
                    class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
                >
                    <span>Schools</span>
                    <svg
                        id="schoolIcon"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transform transition-transform"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="schoolDetails" class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm dotted-border">
                    <div class="mt-6 table-container">
                        <table id="schoolTable" class="min-w-full bg-white dotted-table-border">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border-b dotted-border">Sr#</th>
                                    <th class="py-2 px-4 border-b dotted-border">EMISCODE</th>
                                    <th class="py-2 px-4 border-b dotted-border">School Name</th>
                                    <th class="py-2 px-4 border-b dotted-border">Priority</th>
                                    <th class="py-2 px-4 border-b dotted-border">District</th>
                                    <th class="py-2 px-4 border-b dotted-border">Tehsil</th>
                                    <th class="py-2 px-4 border-b dotted-border">Gender</th>
                                    <th class="py-2 px-4 border-b dotted-border">School Level</th>
                                    <th class="py-2 px-4 border-b dotted-border">Total Teachers</th>
                                    <th class="py-2 px-4 border-b dotted-border">Total Students</th>
                                    <th class="py-2 px-4 border-b dotted-border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="inputRowSchool">
                                    <td class="py-2 px-4 border-b dotted-border"></td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="emiscode" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="EMIS1">EMIS 1</option>
                                            <option value="EMIS2">EMIS 2</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="schoolName" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="School1">School 1</option>
                                            <option value="School2">School 2</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="priority" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="district" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="District1">District 1</option>
                                            <option value="District2">District 2</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="tehsil" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="Tehsil1">Tehsil 1</option>
                                            <option value="Tehsil2">Tehsil 2</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="gender" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="Boys">Boys</option>
                                            <option value="Girls">Girls</option>
                                            <option value="Co-ed">Co-ed</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="schoolLevel" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="Primary">Primary</option>
                                            <option value="Secondary">Secondary</option>
                                            <option value="High">High</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="totalTeachers" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <select id="totalStudents" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </td>
                                    <td class="py-2 px-4 border-b dotted-border">
                                        <button onclick="addSchool()" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->

        <!-- Declaration Accordion -->
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
          <button
            onclick="toggleAccordion('declarationDetails', 'declarationIcon')"
            class="w-full flex justify-between items-center text-left py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
          >
            <span>Declaration</span>
            <svg
              id="declarationIcon"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 transform transition-transform"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div
            id="declarationDetails"
            class="mt-2 p-4 bg-gray-50 rounded-lg hidden shadow-sm dotted-border"
          >
            <div class="mb-4">
              <p class="text-sm font-medium text-gray-700">
                At Present Private Individual has not filled a litigation case
                against Punjab Education Foundation in any court of law
              </p>
              <div>
                <label class="inline-flex items-center mt-2">
                  <input
                    type="radio"
                    class="form-radio"
                    name="litigation"
                    value="yes"
                    required
                  />
                  <span class="ml-2">Yes</span>
                </label>
                <label class="inline-flex items-center ml-4">
                  <input
                    type="radio"
                    class="form-radio"
                    name="litigation"
                    value="no"
                    required
                  />
                  <span class="ml-2">No</span>
                </label>
              </div>
              <div id="caseAttachment" class="mt-2" style="display: none">
                <label class="block text-sm font-medium text-gray-700"
                  >If No, attach photocopy of the case / detail with this
                  application</label

                >
                <input
                  type="file"
                  id="caseFile"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>
            <div class="mb-4">
              <p class="text-md font-medium text-gray-700">
                1. I declare that the information I have provided in this
                application is full and accurate, to the best of my knowledge
                and belief, correct and complete.
              </p>
              <p class="text-md font-medium text-gray-700">
                2. I accept this declaration
              </p>
            </div>
          </div>
        </div>

        <!-- Submit Section -->
        <div class="flex flex-col gap-3 mb-4 items-start">
          <a
            href="./Select_Schools.html"
            type="submit"
            onclick="submitForm()"
            class="mt-4 px-6 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
          >
            Select Schools
          </a>
          <p class="mt-2 mb-5 text-lg font-bold text-red-500">
            Caution: After final Submission of the Application, no correction
            will be permissible. Only Printing of Application will be allowed.
          </p>
        </div>
        <footer class="bg-gray-200 text-center py-4 mt-8">
          <p class="text-gray-600">© 2025 PEIMA</p>
        </footer>
      </div>
    </div>

    <!-- JavaScript -->
    <script>
     document.addEventListener("DOMContentLoaded", function () {
            // Show the popup when the page loads
            document.getElementById("eligibilityPopup").classList.remove("hidden");
        });

        function validateEligibility() {
            const form = document.getElementById("eligibilityForm");
            let allEligible = true;
            let message = ""; // Accumulate messages

            // Helper function to check radio button value
            function getRadioValue(name) {
                const radios = form.querySelectorAll(`input[name="${name}"]`);
                for (const radio of radios) {
                    if (radio.checked) {
                        return radio.value;
                    }
                }
                return null; // Or handle the case where no radio is selected
            }

            // Check group size
            if (getRadioValue("group_size") !== "yes") {
                allEligible = false;
                message += "Your group does not meet the size requirement.\n";
            }
            // Check lead applicant experience
            if (getRadioValue("lead_experience") !== "yes") {
                allEligible = false;
                message +=
                    "The lead applicant does not have the required experience.\n";
            }
            // Check single group application
            if (getRadioValue("single_group") !== "yes") {
                allEligible = false;
                message +=
                    "You are applying in multiple groups, which is not allowed.\n";
            }
            // Check education level
            if (getRadioValue("education_level") !== "yes") {
                allEligible = false;
                message +=
                    "The group does not meet the education level requirement.\n";
            }
            // Check age limit
            if (getRadioValue("age_limit") !== "yes") {
                allEligible = false;
                message += "The group does not meet the age limit requirement.\n";
            }
            // Check police certificate
            if (getRadioValue("police_certificate") !== "yes") {
                allEligible = false;
                message +=
                    "Not all group members have submitted the required police certificate.\n";
            }
            // Check criminal record
            if (getRadioValue("criminal_record") !== "no") {
                allEligible = false;
                message +=
                    "One or more group members have a criminal record, which is not allowed.\n";
            }
            // Check for forged documents
            if (getRadioValue("forged_documents") !== "no") {
                allEligible = false;
                message +=
                    "You have submitted forged documents, which is not allowed.\n";
            }
            // Check for government employees
            if (getRadioValue("govt_employee") !== "no") {
                allEligible = false;
                message +=
                    "One or more group members are serving government employees, which is not allowed.\n";
            }
            // Check for PSRP Phase-I licensees
            if (getRadioValue("psrp_licensee") !== "no") {
                allEligible = false;
                message +=
                    "One or more group members are PSRP Phase-I licensees, which is not allowed.\n";
            }
            // Check for PSRP Phase-I refusal
            if (getRadioValue("psrp_refusal") !== "no") {
                allEligible = false;
                message +=
                    "One or more group members refused to take over / functionalize a school in PSRP Phase-I, which is not allowed.\n";
            }

            if (allEligible) {
                alert("Congratulations! You meet all the eligibility criteria.");
                closePopup();
                // Here you can enable the application form or redirect the user
            } else {
                alert(
                    "You do not meet the eligibility criteria. Please review the following:\n" +
                    message
                );
            }
        }

        function closePopup() {
            document.getElementById("eligibilityPopup").classList.add("hidden");
        }


        // Popup javascript Ends Here ==================================
        // Toggle Accordion Functionality
        function toggleAccordion(id, iconId) {
            const accordionContent = document.getElementById(id);
            const accordionIcon = document.getElementById(iconId);
            accordionContent.classList.toggle("hidden");
            accordionIcon.classList.toggle("rotate-180");
        }

        // Handle Litigation Radio Buttons
        document.addEventListener("DOMContentLoaded", function () {
            const litigationRadios = document.getElementsByName("litigation");
            litigationRadios.forEach((radio) => {
                radio.addEventListener("change", function () {
                    document.getElementById("caseAttachment").style.display =
                        this.value === "no" ? "block" : "none";
                });
            });
        });

        // Form Submission Handler
        function submitForm() {
            const declarationAccepted =
                document.getElementById("acceptDeclaration").checked;
            if (!declarationAccepted) {
                alert("Please accept the declaration before submitting.");
                return;
            }
            alert("Form submitted successfully!");
        }

        // Qualification Table Functionality
        let qualificationCounter = 1;

        let currentlyEditing = null; // Keep track of the row being edited

        function addQualification() {
            const applicant = document.getElementById("applicant").value;
            const degree = document.getElementById("degree").value;
            const institution = document.getElementById("institution").value;
            const type = document.getElementById("type").value;
            const percentage = document.getElementById("percentage").value;
            const from = document.getElementById("from").value;
            const to = document.getElementById("to").value;

            const tableBody = document.querySelector("#qualificationTable tbody");
            let newRow = document.createElement("tr");

            if (currentlyEditing) {
                // Update existing row
                newRow = currentlyEditing;
                newRow.innerHTML = `
            <td class="py-2 px-4 border-b dotted-border">${applicant}</td>
            <td class="py-2 px-4 border-b dotted-border">${degree}</td>
            <td class="py-2 px-4 border-b dotted-border">${institution}</td>
            <td class="py-2 px-4 border-b dotted-border">${type}</td>
            <td class="py-2 px-4 border-b dotted-border">${percentage}</td>
            <td class="py-2 px-4 border-b dotted-border">${from}</td>
            <td class="py-2 px-4 border-b dotted-border">${to}</td>
            <td class="py-2 px-4 border-b dotted-border">
              <button onclick="editRow(this.parentNode.parentNode)" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Edit</button>
                        <button onclick="deleteRow(this)" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Delete</button>
            </td>
        `;
                currentlyEditing = null; // Clear the editing flag
                // Restore "Add" button text
                document.querySelector("[onclick='addQualification()']").textContent =
                    "Add";
            } else {
                // Create a new row
                newRow.innerHTML = `
            <td class="py-2 px-4 border-b dotted-border">${applicant}</td>
            <td class="py-2 px-4 border-b dotted-border">${degree}</td>
            <td class="py-2 px-4 border-b dotted-border">${institution}</td>
            <td class="py-2 px-4 border-b dotted-border">${type}</td>
            <td class="py-2 px-4 border-b dotted-border">${percentage}</td>
            <td class="py-2 px-4 border-b dotted-border">${from}</td>
            <td class="py-2 px-4 border-b dotted-border">${to}</td>
            <td class="py-2 px-4 border-b dotted-border">
                <button onclick="editRow(this.parentNode.parentNode)" class="text-blue-500 hover:text-blue-700">Edit</button>
                <button onclick="deleteRow(this)" class="text-red-500 hover:text-red-700">Delete</button>
            </td>
        `;
                tableBody.insertBefore(newRow, document.getElementById("inputRow"));
            }

            // Clear form fields and reset to default values
            document.getElementById("applicant").value = "Applicant1";
            document.getElementById("degree").value = "BSc";
            document.getElementById("institution").value = "Inst1";
            document.getElementById("type").value = "Regular";
            document.getElementById("percentage").value = "50";
            document.getElementById("from").value = "2020-01-01";
            document.getElementById("to").value = "2022-01-01";
        }

        function deleteRow(button) {
            const row = button.closest("tr");
            row.remove();
            // Restore "Add" button text if deleting currentlyEditing row
            if (currentlyEditing === row) {
                document.querySelector("[onclick='addQualification()']").textContent =
                    "Add";
                currentlyEditing = null;
            }
        }

        function editRow(row) {
            currentlyEditing = row; // Set the row we're editing
            const cells = row.querySelectorAll("td");

            // Populate the form with the row's data
            document.getElementById("applicant").value = cells[0].textContent;
            document.getElementById("degree").value = cells[1].textContent;
            document.getElementById("institution").value = cells[2].textContent;
            document.getElementById("type").value = cells[3].textContent;
            document.getElementById("percentage").value = cells[4].textContent;
            document.getElementById("from").value = cells[5].textContent;
            document.getElementById("to").value = cells[6].textContent;

            // Change "Add" button text to "Update"
            document.querySelector("[onclick='addQualification()']").textContent =
                "Update";
        }
        function saveQualifications() {
            alert("Qualifications saved successfully!");
        }
        let currentlyEditingExperience = null; // Track which experience row is being edited
let experienceCounter = 1;

function addExperience() {
    const applicant = document.getElementById('applicantExperience').value;
    const employer = document.getElementById('employer').value;
    const designation = document.getElementById('designation').value;
    const from = document.getElementById('fromExperience').value;
    const to = document.getElementById('toExperience').value;
    const expYears = document.getElementById('expYears').value;

    const tableBody = document.querySelector('#experienceTable tbody');
    let newRow = document.createElement('tr');

    if (currentlyEditingExperience) {
        // Update existing row
        newRow = currentlyEditingExperience;
        newRow.innerHTML = `
            <td class="py-2 px-4 border-b dotted-border">${newRow.rowIndex}</td>
            <td class="py-2 px-4 border-b dotted-border">${applicant}</td>
            <td class="py-2 px-4 border-b dotted-border">${employer}</td>
            <td class="py-2 px-4 border-b dotted-border">${designation}</td>
            <td class="py-2 px-4 border-b dotted-border">${from}</td>
            <td class="py-2 px-4 border-b dotted-border">${to}</td>
            <td class="py-2 px-4 border-b dotted-border">${expYears}</td>
            <td class="py-2 px-4 border-b dotted-border">
                 <button onclick="editExperienceRow(this.parentNode.parentNode)" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Edit</button>
                <button onclick="deleteExperienceRow(this)" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Delete</button>
            </td>
        `;
        currentlyEditingExperience = null; // Clear the editing flag
         // Restore "Add" button text
         document.querySelector("[onclick='addExperience()']").textContent = "Add";
    } else {
        // Create a new row
        newRow.innerHTML = `
             <td class="py-2 px-4 border-b dotted-border">${experienceCounter++}</td>
            <td class="py-2 px-4 border-b dotted-border">${applicant}</td>
            <td class="py-2 px-4 border-b dotted-border">${employer}</td>
            <td class="py-2 px-4 border-b dotted-border">${designation}</td>
            <td class="py-2 px-4 border-b dotted-border">${from}</td>
            <td class="py-2 px-4 border-b dotted-border">${to}</td>
            <td class="py-2 px-4 border-b dotted-border">${expYears}</td>
            <td class="py-2 px-4 border-b dotted-border">
                <button onclick="editExperienceRow(this.parentNode.parentNode)" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Edit</button>
                <button onclick="deleteExperienceRow(this)" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Delete</button>
            </td>
        `;
        tableBody.insertBefore(newRow, document.getElementById('inputRowExperience'));
    }

    // Clear form fields
    document.getElementById('applicantExperience').value = 'Applicant1';
    document.getElementById('employer').value = 'Employer1';
    document.getElementById('designation').value = 'Manager';
    document.getElementById('fromExperience').value = '2020-01-01';
    document.getElementById('toExperience').value = '2022-01-01';
    document.getElementById('expYears').value = '1';
}

function deleteExperienceRow(button) {
    const row = button.closest('tr');
    row.remove();
      // Restore "Add" button text if deleting currentlyEditing row
      if (currentlyEditingExperience === row) {
        document.querySelector("[onclick='addExperience()']").textContent = "Add";
        currentlyEditingExperience = null;
    }
}

function editExperienceRow(row) {
    currentlyEditingExperience = row; // Set the row we're editing
    const cells = row.querySelectorAll('td');

    // Populate the form with the row's data
    document.getElementById('applicantExperience').value = cells[1].textContent;
    document.getElementById('employer').value = cells[2].textContent;
    document.getElementById('designation').value = cells[3].textContent;
    document.getElementById('fromExperience').value = cells[4].textContent;
    document.getElementById('toExperience').value = cells[5].textContent;
    document.getElementById('expYears').value = cells[6].textContent;

    // Change "Add" button text to "Update"
    document.querySelector("[onclick='addExperience()']").textContent = "Update";
}

        // School Table Functionality
        let schoolCounter = 1;

        function addSchool() {
            const emiscode = document.getElementById("emiscode").value;
            const schoolName = document.getElementById("schoolName").value;
            const priority = document.getElementById("priority").value;
            const district = document.getElementById("district").value;
            const tehsil = document.getElementById("tehsil").value;
            const gender = document.getElementById("gender").value;
            const schoolLevel = document.getElementById("schoolLevel").value;
            const totalTeachers = document.getElementById("totalTeachers").value;
            const totalStudents = document.getElementById("totalStudents").value;

            const tableBody = document.querySelector("#schoolTable tbody");
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td class="py-2 px-4 border-b dotted-border">${schoolCounter++}</td>
                <td class="py-2 px-4 border-b dotted-border">${emiscode}</td>
                <td class="py-2 px-4 border-b dotted-border">${schoolName}</td>
                <td class="py-2 px-4 border-b dotted-border">${priority}</td>
                <td class="py-2 px-4 border-b dotted-border">${district}</td>
                <td class="py-2 px-4 border-b dotted-border">${tehsil}</td>
                <td class="py-2 px-4 border-b dotted-border">${gender}</td>
                <td class="py-2 px-4 border-b dotted-border">${schoolLevel}</td>
                <td class="py-2 px-4 border-b dotted-border">${totalTeachers}</td>
                <td class="py-2 px-4 border-b dotted-border">${totalStudents}</td>
                <td class="py-2 px-4 border-b dotted-border">
                    <button onclick="deleteRow(this)" class="text-red-500 hover:text-red-700">Delete</button>
                </td>
            `;
            tableBody.insertBefore(
                newRow,
                document.getElementById("inputRowSchool")
            );

            // Clear form fields
            document.getElementById("emiscode").value = "";
            document.getElementById("schoolName").value = "";
            document.getElementById("priority").value = "High";
            document.getElementById("district").value = "";
            document.getElementById("tehsil").value = "";
            document.getElementById("gender").value = "Co-ed";
            document.getElementById("schoolLevel").value = "Primary";
            document.getElementById("totalTeachers").value = "1";
            document.getElementById("totalStudents").value = "50";
        }

        // Delete Row Functionality
        function deleteRow(button) {
            const row = button.closest("tr");
            const tableId = row.closest("table").id;
            if (
                row.id !== "inputRow" &&
                row.id !== "inputRowSchool" &&
                row.id !== "inputRowExperience"
            ) {
                row.remove();
                if (tableId === "qualificationTable") {
                    // No counter for qualifications since it's not numbered
                } else if (tableId === "experienceTable") {
                    experienceCounter--;
                    document
                        .querySelectorAll("#experienceTable tbody tr")
                        .forEach((tr, index) => {
                            if (tr.id !== "inputRowExperience") {
                                tr.children[0].textContent = index + 1;
                            }
                        });
                } else if (tableId === "schoolTable") {
                    schoolCounter--;
                    document
                        .querySelectorAll("#schoolTable tbody tr")
                        .forEach((tr, index) => {
                            if (tr.id !== "inputRowSchool") {
                                tr.children[0].textContent = index + 1;
                            }
                        });
                }
            }
        }
      
    </script>
  </body>
</html>
