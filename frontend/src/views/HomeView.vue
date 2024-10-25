<template>
  <div class="home">
    <LandingPageHeader/>
    <main class="landing">
      <!--hero section-->
      <LandingPageWindow1/>
      
      <!--features section-->
      <LandingPageWindow2/>
   

    <!-- CTA Section -->
    <section class="cta-section">
      <div class="cta-content">
        <h2>Ready to get started?</h2>
        <a href="/signup" class="btn-large">Join Us Today</a>
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
import LandingPageWindow1 from '@/components/landingPage/LandingPageWindow1.vue';
import LandingPageWindow2 from '@/components/landingPage/LandingPageWindow2.vue';

export default {
  name: 'HomeView',
  components: {
    LandingPageFooter,
    LandingPageHeader,
    LandingPageWindow1,
    LandingPageWindow2
  },
  setup(){

  }
}
</script>

<style scoped>
/* Landing Page Styles */
.home{
  background: linear-gradient(to bottom, #8b0000, #0c0c0c);

}
.landing {
  font-family: Arial, sans-serif;
}




/* CTA Section */
.cta-section {
  padding: 60px 20px;
  text-align: center;
}

.cta-section  h2 {
  color: #c9c8c7;
}

.cta-content{
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-direction: column;
}

.cta-section .btn-large {
  padding: 20px 40px;
  font-size: 1.5em;
  text-decoration: none;
  border-radius: 30px;
  background-color:#0c0c0c;
  color: #c9c8c7;
}

.cta-section .btn-large:hover {
  color: #0c0c0c;
  background-color:#c9c8c7;

}

.container {
  max-width: 1200px;
  margin: 0 auto;
}
</style>
