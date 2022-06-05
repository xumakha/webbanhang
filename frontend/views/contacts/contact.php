<?php
?>
<main class="main" id="main">
      <div class="fade-in wrapper">



          <h1 class="page-title has-dash">Contact</h1>


  <div class="page-content theme-content">
    <form method="post" class="contact-form">
        <h3 style="color: green; text-align: center">
            <?php
            if(isset($_SESSION['success'])) {
                echo $_SESSION['success'];
            }
            ?>
        </h3>
      <div class="contact-form-block contact-name">
        <label class="contact-label" for="name">Name</label>
        <div class="input-holder">
          <input type="text" name="name" id="name" value="" tabindex="1" />
        </div>
      </div>
      <div class="contact-form-block contact-email">
        <label class="contact-label" for="email">Email</label>
        <div class="input-holder">
          <input type="email" name="email" id="email" value="" tabindex="2" />
        </div>
      </div>
      <div class="contact-form-block contact-subject">
        <label class="contact-label" for="subject">Subject</label>
        <div class="input-holder">
          <input type="text" name="subject" id="subject" value="" tabindex="3" />
        </div>
      </div>
      <div class="contact-form-block contact-message">
        <label class="contact-label" for="message">Message</label>
        <div class="input-holder">
          <textarea name="message" id="message" tabindex="4">
</textarea>
        </div>
      </div>
      <div class="contact-form-block contact-recaptcha">
        <div class="recaptcha-note">
          <script src="asset/js/api.js"></script><script src="asset/js/contact-6976d753453bb7392dd2195bfb9fd56d685bbd2f8584586b8ddb76672a11009d.js"></script><style>.grecaptcha-badge { visibility: hidden; }</style>This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
        </div>
      </div>
      <div class="contact-form-block contact-send">
        <button class="send-message-button button" name="submit" title="Send message" tabindex="6">Send message</button>
      </div>
    </form>
  </div>




      </div>
    </main>