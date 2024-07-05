<?php


if (!isset($_SESSION['user_id'])) {
  $profileButtonStyle = "display: none;";
} else {
  $profileButtonStyle = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./Chatbot2/style.css">
  <link rel="stylesheet" href="./css/indexpage.css">
  <link rel="stylesheet" href="./css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="icon" type="image/x-icon" href="./Assets/Logo03.png">

  <script src="./Chatbot2/script.js" defer></script>

  <title>index</title>
</head>

<body>

  <div class="container-fluid  home">
    <!--Nav-->
    <div class="col-12 ">
      <?php
      include "nav.php";
      ?>
    </div>

    <!--Page Contents-->
    <div class="row ">
      <div class="container ">
        <div class="row ">
          <div class="col-12 col-md-12 home_main d-flex ">
            <div class="col-12 col-md-6 set_mini justify-content-center align-iteam-center">
              <h1 class="topic1 text-start">Take Care of your</h1>
              <h1 class="topic2 text-start"> HEALTH </h1>
              <p class="sub_topic text-start">Empowering Health, Enriching Lives</p>
              <div class="row ">
                <button class="btn01" data-bs-toggle="modal" data-bs-target="#appointmentModal" type="submit">Add Appoinments</button>
                <button class="btn01" data-bs-toggle="modal" data-bs-target="#reviewModal" type="button">Add Review</button>

                <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <!-- Appointment form -->
                        <form id="appointmentForm" method="post" action="../Controllers/add_appointment.php">
                          <div class="mb-3">
                            <label for="Patient Name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control" id="patientName" name="patientName" required>
                          </div>
                          <div class="mb-3">
                            <label for="Symptom" class="form-label">Symptom</label>
                            <input type="text" class="form-control" id="Symptom" name="Symptom" required style="width: 382px;">
                          </div>
                          <div class="mb-3">
                            <label for="Appoinment Date" class="form-label">Appoinment Date</label>
                            <input type="date" class="form-control" id="appoinmentDate" name="appoinmentDate" required style="width: 382px;">
                          </div>
                          <div class="mb-3">
                            <label for="Appoinment Time" class="form-label">Appoinment Time</label>
                            <input type="time" class="form-control" id="appoinmentTime" name="appoinmentTime" required style="width: 382px;">
                          </div>
                          <label for="takingMedications" class="form-label">Taking Any Medications Currently?</label>
                          <select class="form-select" id="takingMedications" name="takingMedications" required style="width: 215px;">
                            <option value="yes">Yes</option>
                            <option value="no" selected>No</option>
                          </select>
                      </div>
                      <div class="mb-3" id="medicationDetails" style="display: none;">
                        <label for="medicationDetails" class="form-label">&nbsp;&nbsp;Medication Details</label>
                        <input class="form-control" id="medicationDetails" name="medicationDetails" style="width: 382px;"></input>
                      </div>
                      <div class="mb-3">
                        <label for="contactNo" class="form-label">&nbsp;&nbsp;Contact Number (Sri Lanka)</label>
                        <div class="input-group">
                          <span class="input-group-text">+94</span>
                          <input type="number" class="form-control" id="contactNo" name="contactNo" required pattern="[0-9]{9}" title="Please enter a valid Sri Lankan phone number consisting of 9 digits after +94" style="width: 332px;">
                        </div>
                      </div>

                      <script>
                        //form valifdation
                        document.getElementById("contactNo").addEventListener("input", function() {
                          var inputValue = this.value.replace(/\D/g, '');
                          if (inputValue.length > 9) {
                            this.value = inputValue.slice(0, 9);
                          }
                        });
                      </script>


                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="submitAppointment">Save Appointment</button>
                      </div>
                      </form>

                    </div>

                  </div>

                </div>
                <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                        <!-- Review Form -->
                        <form id="reviewForm" method="post" action="../Controllers/addReview.php">
                          <div class="mb-3">
                            <label for="reviewName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="reviewName" name="reviewName" required>
                          </div>
                          <div class="mb-3">
                            <label for="reviewMessage" class="form-label">Message</label>
                            <textarea class="form-control" id="reviewMessage" name="reviewMessage" rows="3" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="reviewRating" class="form-label">Rating</label>
                            <!-- Star Rating Input -->
                            <div class="rating">
                              <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 stars">5 stars</label>
                              <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">4 stars</label>
                              <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">3 stars</label>
                              <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">2 stars</label>
                              <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">1 star</label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-success">Submit Review</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  </div>

  <!--footer-->
  <div class="col-12 mt-1 ">
    <section class="section__container service__container" id="Service">
      <div class="service__header">
        <div class="service__header__content">
          <h2 class="section__header">Our Special service</h2>
          <p>
            Beyond simply providing medical care, our commitment lies in
            delivering unparalleled service tailored to your unique needs.
          </p>
        </div>
        <button class="btn01 ">Ask A Service</button>
      </div>
      <div class="service__grid">
        <div class="service__card">
          <span><i class="ri-microscope-line"></i></span>
          <h4>Laboratory Test</h4>
          <p>
            Accurate Diagnostics, Swift Results: Experience top-notch Laboratory
            Testing at our facility.
          </p>
          <a href="#">Learn More</a>
        </div>
        <div class="service__card">
          <span><i class="ri-mental-health-line"></i></span>
          <h4>Health Check</h4>
          <p>
            Our thorough assessments and expert evaluations help you stay
            proactive about your health.
          </p>
          <a href="#">Learn More</a>
        </div>
        <div class="service__card">
          <span><i class="ri-hospital-line"></i></span>
          <h4>General Dentistry</h4>
          <p>
            Experience comprehensive oral care with Dentistry. Trust us to keep
            your smile healthy and bright.
          </p>
          <a href="#">Learn More</a>
        </div>
      </div>
    </section>
    <section class="section__container about__container" id="01">
      <div class="about__content">
        <h2 class="section__header">About Us</h2>
        <p>
          Welcome to our healthcare website, your one-stop destination for
          reliable and comprehensive health care information. We are committed
          to promoting wellness and providing valuable resources to empower you
          on your health journey.
        </p>
        <p>
          Explore our extensive collection of expertly written articles and
          guides covering a wide range of health topics. From understanding
          common medical conditions to tips for maintaining a healthy lifestyle,
          our content is designed to educate, inspire, and support you in making
          informed choices for your health.
        </p>
        <p>
          Discover practical health tips and lifestyle advice to optimize your
          physical and mental well-being. We believe that small changes can lead
          to significant improvements in your quality of life, and we're here to
          guide you on your path to a healthier and happier you.
        </p>
      </div>
      <div class="about__image">
        <img src="assets/about.jpg" alt="about" />
      </div>
    </section>

    <section class="section__container why__container">
      <div class="why__image">
        <img src="assets/choose-us.jpg" alt="why choose us" />
      </div>
      <div class="why__content">
        <h2 class="section__header">Why Choose Us</h2>
        <p>
          With a steadfast commitment to your well-being, our team of highly
          trained healthcare professionals ensures that you receive nothing
          short of exceptional patient experiences.
        </p>
        <div class="why__grid">
          <span><i class="ri-hand-heart-line"></i></span>
          <div>
            <h4>Intensive Care</h4>
            <p>
              Our Intensive Care Unit is equipped with advanced technology and
              staffed by team of professionals
            </p>
          </div>
          <span><i class="ri-truck-line"></i></span>
          <div>
            <h4>Free Ambulance Car</h4>
            <p>
              A compassionate initiative to prioritize your health and
              well-being without any financial burden.
            </p>
          </div>
          <span><i class="ri-hospital-line"></i></span>
          <div>
            <h4>Medical and Surgical</h4>
            <p>
              Our Medical and Surgical services offer advanced healthcare
              solutions to address medical needs.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container doctors__container">
      <div class="doctors__header">
        <div class="doctors__header__content">
          <h2 class="section__header">Our Special Doctors</h2>
          <p>
            We take pride in our exceptional team of doctors, each a specialist
            in their respective fields.
          </p>
        </div>
        <div class="doctors__nav">
          <span><i class="ri-arrow-left-line"></i></span>
          <span><i class="ri-arrow-right-line"></i></span>
        </div>
      </div>
      <div class="doctors__grid">
        <div class="doctors__card">
          <div class="doctors__card__image">
            <img src="assets/doctor-1.jpg" alt="doctor" />
            <div class="doctors__socials">
              <span><i class="ri-instagram-line"></i></span>
              <span><i class="ri-facebook-fill"></i></span>
              <span><i class="ri-heart-fill"></i></span>
              <span><i class="ri-twitter-fill"></i></span>
            </div>
          </div>
          <h4>Dr. Emily Smith</h4>
          <p>Cardiologist</p>
        </div>
        <div class="doctors__card">
          <div class="doctors__card__image">
            <img src="assets/doctor-2.jpg" alt="doctor" />
            <div class="doctors__socials">
              <span><i class="ri-instagram-line"></i></span>
              <span><i class="ri-facebook-fill"></i></span>
              <span><i class="ri-heart-fill"></i></span>
              <span><i class="ri-twitter-fill"></i></span>
            </div>
          </div>
          <h4>Dr. James Anderson</h4>
          <p>Neurosurgeon</p>
        </div>
        <div class="doctors__card">
          <div class="doctors__card__image">
            <img src="assets/doctor-3.jpg" alt="doctor" />
            <div class="doctors__socials">
              <span><i class="ri-instagram-line"></i></span>
              <span><i class="ri-facebook-fill"></i></span>
              <span><i class="ri-heart-fill"></i></span>
              <span><i class="ri-twitter-fill"></i></span>
            </div>
          </div>
          <h4>Dr. Michael Lee</h4>
          <p>Dermatologist</p>
        </div>
      </div>
    </section>
  </div>

    <!--Reivews-->
    <div class="col-12 mt-3 " id="review">
    <?php
    include "reviews copy.php";
    ?>
  </div>

  <!--footer-->
  <div class="col-12 mt-3 " style="background-color:#011a0e" id="footer">
    <?php
    include "footer.php";
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    function handleFormSubmission() {
      fetch(document.getElementById('appointmentForm').action, {
          method: 'POST',
          body: new FormData(document.getElementById('appointmentForm')),
        })
        .then(response => {
          if (response.ok) {
            Swal.fire({
              title: 'Success!',
              text: 'Appointment added successfully!',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              $('#appointmentModal').modal('hide');
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Slot is already taken. Try to next 10 minutes.',
            });
          }
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong. Please try again later.',
          });
        });
    }

    function validateForm() {
      var patientName = document.getElementById('patientName').value;
      var symptom = document.getElementById('Symptom').value;
      var appoinmentDate = document.getElementById('appoinmentDate').value;
      var appoinmentTime = document.getElementById('appoinmentTime').value;
      var contactNo = document.getElementById('contactNo').value;

      if (patientName === '' || symptom === '' || appoinmentDate === '' || appoinmentTime === '' || contactNo === '') {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please fill in all the required fields!',
        });

        return false;
      }
      return true;
    }
    // Show/hide medication details textarea based on medication selection
    document.getElementById('takingMedications').addEventListener('change', function() {
      var medicationDetails = document.getElementById('medicationDetails');
      if (this.value === 'yes') {
        medicationDetails.style.display = 'block';
      } else {
        medicationDetails.style.display = 'none';
      }
    });

    document.getElementById('submitAppointment').addEventListener('click', function() {
      // Validate the form
      if (validateForm()) {
        Swal.fire({
          title: 'Are you sure?',
          text: 'Do you want to save this appointment?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, save it!'
        }).then((result) => {
          if (result.isConfirmed) {
            handleFormSubmission();
          }
        });
      }
    });
    <?php
    if (isset($_SESSION['feedback'])) {
      $message = $_SESSION['feedback'];
      echo "Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '{$message}',
          confirmButtonText: 'OK'
        });";
      unset($_SESSION['feedback']);
    }
    ?>
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      <?php
      if (isset($_SESSION['feedback'])) {
        echo "Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '" . addslashes($_SESSION['feedback']) . "',
                confirmButtonText: 'OK'
            });";
        unset($_SESSION['feedback']);
      }
      ?>
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>