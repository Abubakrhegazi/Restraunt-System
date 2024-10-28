<template>
  <!-- Hero Section -->
  <section class="hero">
      <div class="hero-content">
        <img :src="require('@/assets/landingPagePhotos/chiefsHat.png')" alt="Chiefs Hat" />
        <h1>Make your dream resturant a reality!</h1>
        <p>Your future resturant is in between your hands, signup for a free trial and enjoy your
            first month for only 1$!</p>
        <RouterLink to="/signup" class="btn">Get Started</RouterLink>
      </div>
    </section>
</template>


<style scoped>
/* Hero Section */
.hero {
  padding: 80px 20px;
  text-align: center;
  justify-content: center;
  display: flex;

}

.hero-content{
    max-width : 650px;
}

.hero img{
  max-width: 30vw;
  max-height: 40vh;
}

.hero h1 {
  font-size: 3em;
  margin-bottom: 50px;
  color: #0c0c0c;

}

.hero p {
  font-size: 1.5em;
  line-height: 1.5;
  margin-bottom: 50px;
  color: #0c0c0c;
}

.hero .btn {
  padding: 15px 30px;
  border: 3px solid #0c0c0c;
  border-radius: 25px;
  font-weight: bold;
  text-decoration: none;
  font-size: 1.2em;
  color: #0c0c0c;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.hero .btn:hover {
  background-color: #0c0c0c;
  color: #c9c8c7;
}


@media (max-width: 600px) {
    .hero{
        text-align: left;
    }

    .hero-content{
        max-width: 400px;
    }

    .hero-content p {
        max-width: 340px;
    }
}
</style>