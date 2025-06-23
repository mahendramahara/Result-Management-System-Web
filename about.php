<?php
$pageTitle = "About Us";
include('includes/header.php');
include('includes/nav.php');
?>

<style>
    .about-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 20px;
    }
    
    .about-hero {
        text-align: center;
        padding: 60px 20px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        color: var(--white);
        border-radius: 8px;
        margin-bottom: 40px;
        box-shadow: 0 4px 10px var(--shadow-light);
    }
    
    .about-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .tagline {
        font-size: 1.2rem;
        opacity: 0.9;
    }
    
    .about-sections {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .about-sections section {
        background: var(--white);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px var(--shadow-light);
        transition: transform 0.3s ease;
    }
    
    .about-sections section:hover {
        transform: translateY(-5px);
    }
    
    .icon-container {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 20px;
    }
    
    .icon-container i {
        font-size: 32px;
        color: var(--white);
    }
    
    .about-sections h2 {
        color: var(--primary-color);
        margin-bottom: 15px;
        text-align: center;
    }
    
    .features-section ul {
        list-style-type: none;
        padding: 0;
    }
    
    .features-section li {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    
    .features-section li i {
        color: var(--primary-color);
        margin-right: 10px;
    }
    
    .team-members {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-top: 20px;
    }
    
    .team-member {
        text-align: center;
        margin: 10px;
        flex: 1;
        min-width: 150px;
    }
    
    .member-avatar {
        width: 80px;
        height: 80px;
        background-color: var(--light-bg);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 15px;
        border: 3px solid var(--primary-color);
    }
    
    .member-avatar i {
        font-size: 32px;
        color: var(--primary-color);
    }
    
    .testimonials-section {
        background: var(--white);
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 6px var(--shadow-light);
        margin-bottom: 40px;
        text-align: center;
    }
    
    .testimonials {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }
    
    .testimonial {
        background-color: var(--light-bg);
        padding: 25px;
        border-radius: 8px;
        position: relative;
    }
    
    .quote {
        color: var(--primary-color);
        font-size: 24px;
        margin-bottom: 15px;
    }
    
    .contact-section {
        background: linear-gradient(to bottom, var(--light-bg), white);
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 6px var(--shadow-light);
        text-align: center;
    }
    
    .contact-info {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 30px;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        margin: 0 20px 15px;
    }
    
    .contact-item i {
        font-size: 20px;
        color: var(--primary-color);
        margin-right: 10px;
    }
    
    @media (max-width: 768px) {
        .about-hero h1 {
            font-size: 2rem;
        }
        
        .about-sections, .testimonials {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="about-container">
    <div class="about-hero">
        <h1>About Our Result Management System</h1>
        <p class="tagline">Empowering educators and students with seamless result management</p>
    </div>
    
    <div class="about-sections">
        <section class="mission-section">
            <div class="icon-container">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2>Our Mission</h2>
            <p>We strive to simplify the academic result management process, making it efficient, 
            transparent, and accessible for educational institutions of all sizes.</p>
        </section>
        
        <section class="features-section">
            <div class="icon-container">
                <i class="fas fa-star"></i>
            </div>
            <h2>Key Features</h2>
            <ul>
                <li><i class="fas fa-check-circle"></i> Comprehensive student result tracking</li>
                <li><i class="fas fa-check-circle"></i> Easy-to-use interface for administrators</li>
                <li><i class="fas fa-check-circle"></i> Secure and efficient data management</li>
                <li><i class="fas fa-check-circle"></i> Detailed performance analytics</li>
                <li><i class="fas fa-check-circle"></i> Customizable grading systems</li>
            </ul>
        </section>
        
        <section class="team-section">
            <div class="icon-container">
                <i class="fas fa-users"></i>
            </div>
            <h2>Our Team</h2>
            <p>Our dedicated team of developers and education specialists work together to create a system
            that meets the unique needs of modern educational institutions.</p>
            <div class="team-members">
                <div class="team-member">
                    <div class="member-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>John Doe</h3>
                    <p>Lead Developer</p>
                </div>
                <div class="team-member">
                    <div class="member-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Jane Smith</h3>
                    <p>UX Designer</p>
                </div>
                <div class="team-member">
                    <div class="member-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Mark Johnson</h3>
                    <p>Education Specialist</p>
                </div>
            </div>
        </section>
    </div>
    
    <div class="testimonials-section">
        <h2>What Our Users Say</h2>
        <div class="testimonials">
            <div class="testimonial">
                <div class="quote"><i class="fas fa-quote-left"></i></div>
                <p>This system has completely transformed how we manage student results at our college. It's intuitive and powerful.</p>
                <div class="testimonial-author">- Dr. Robert Williams, Principal</div>
            </div>
            <div class="testimonial">
                <div class="quote"><i class="fas fa-quote-left"></i></div>
                <p>As a teacher, I appreciate how easy it is to input and analyze student performance data. Highly recommended!</p>
                <div class="testimonial-author">- Sarah Johnson, Math Teacher</div>
            </div>
        </div>
    </div>
    
    <div class="contact-section">
        <h2>Get In Touch</h2>
        <p>Have questions or feedback? We'd love to hear from you.</p>
        <div class="contact-info">
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>contact@resultsystem.edu</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>+1 (555) 123-4567</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>123 Education Lane, Learning City</span>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
