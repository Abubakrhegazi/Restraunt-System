<template>
  <div class="home">
    <LandingPageHeader/>
    <main class="landing">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <h1>Welcome to Our Platform</h1>
        <p>Your solution for [insert service/solution]!</p>
        <a href="/signup" class="btn">Get Started</a>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features">
      <div class="container">
        <h2>Why Choose Us?</h2>
        <div class="features-grid">
          <div class="feature-item">
            <h3>Feature 1</h3>
            <p>Short description of the first key feature or benefit.</p>
          </div>
          <div class="feature-item">
            <h3>Feature 2</h3>
            <p>Short description of the second key feature or benefit.</p>
          </div>
          <div class="feature-item">
            <h3>Feature 3</h3>
            <p>Short description of the third key feature or benefit.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
      <div class="cta-content">
        <h2>Ready to get started?</h2>
        <a href="/signup" class="btn btn-large">Join Us Today</a>
      </div>
    </section>
  </main>
  <LandingPageFooter/>
  </div>
</template>

<script>
// @ is an alias to /src
import LandingPageFooter from '@/components/landingPage/LandingPageFooter.vue';
import LandingPageHeader from '@/components/landingPage/LandingPageHeader.vue';

export default {
  name: 'HomeView',
  components: {
    LandingPageFooter,
    LandingPageHeader
  },
  setup(){

  }
}
</script>

<style scoped>
/* Landing Page Styles */
.landing {
  font-family: Arial, sans-serif;
}

/* Hero Section */
.hero {
  background-color: #0F110C; /* Dark red */
  color: #FDECEF;
  padding: 80px 20px;
  text-align: center;
}

.hero h1 {
  font-size: 3em;
  margin-bottom: 20px;
}

.hero p {
  font-size: 1.5em;
  margin-bottom: 30px;
}

.hero .btn {
  background-color: #FDECEF; /* White */
  color: #0F110C;
  padding: 15px 30px;
  border-radius: 25px;
  font-weight: bold;
  text-decoration: none;
  font-size: 1.2em;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.hero .btn:hover {
  background-color: #0F110C;
  color: #FDECEF;
}

/* Features Section */
.features {
  background-color: #FDECEF;
  padding: 60px 20px;
  text-align: center;
}

.features h2 {
  font-size: 2.5em;
  margin-bottom: 40px;
}

.features-grid {
  display: flex;
  gap: 40px;
  justify-content: center;
  flex-wrap: wrap;
}

.feature-item {
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 10px;
  width: 300px;
}

.feature-item h3 {
  font-size: 1.5em;
  margin-bottom: 10px;
}

.feature-item p {
  font-size: 1em;
  color: #666666;
}

/* CTA Section */
.cta-section {
  background-color: #0F110C;
  color: #FDECEF;
  padding: 60px 20px;
  text-align: center;
}

.cta-section .btn-large {
  background-color: #FDECEF;
  color: #0F110C;
  padding: 20px 40px;
  font-size: 1.5em;
  border-radius: 30px;
}

.cta-section .btn-large:hover {
  background-color: #0F110C;
  color: #FDECEF;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}
</style>
