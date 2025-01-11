<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'about-us';


$title = 'About Us - Zooptools';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';

$style = '';
$toextra = true;

ob_start();
?> 
<style>
    .contact-container {
    display: flex;
    max-width: 1000px;
    margin: 0 auto;
    background: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.form-section, .details-section {
    flex: 1;
    padding: 40px;
}

.form-section {
    background: #f4f4f4;
    border-right: 1px solid #ddd;
}

.details-section {
    background: #ffffff;
    color: #333; 
    flex-direction: column;
    justify-content: space-between;
    text-align: left;
}

h2 {
    margin-bottom: 15px;
    color: #333;
}

p {
    margin-bottom: 20px;
    color: #666;
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.input-group label {
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

.input-group input, .input-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    outline: none;
    transition: all 0.3s ease;
}

.input-group input:focus, .input-group textarea:focus {
    border-color:var( --primary-accent);
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.4);
}

textarea {
    resize: none;
}

.btn {
    background: var( --primary-accent);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn:hover {
    background: #218838;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.contact-item i {
    font-size: 24px;
    color: var( --primary-accent);
}

.contact-item p {
    margin: 0;
    color: #555;
}

/* .social-links {
    display: flex;
    gap: 10px;
} */

/* .social-links a {
    display: inline-block;
    width: 40px;
    height: 40px;
    background: #f4f4f4;
    color: #555;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-links a:hover {
    background: #28a745;
    color: white;
} */

 @media (max-width:600px){
    .contact-container{display: block;}
    .form-section, .details-section {
    width: 100%;
    padding: 40px;
}
 }
</style>
<div class="container" style="margin: 4% auto;">
<div class="contact-container">
        <div class="form-section">
            <h2>Contact Us</h2>
            <p>We’d love to hear from you! Fill out the form and we’ll get back to you as soon as possible.</p>
            <form>
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Enter your full name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" rows="5" placeholder="Your message" required></textarea>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>

        <div class="details-section">
            <h2>Get in Touch</h2>
            <!-- <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <p>1234 Elm Street, Springfield, USA</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <p>+1 (555) 123-4567</p>
            </div> -->
            <div class="contact-item">
                <p><b>Email: </b></p>
                <a href="mailto:info@zooptools.com"><p>info@zooptools.com</p></a>
                
            </div>
            <div class="social-links">
                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
$tool_container = ob_get_clean(); 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>