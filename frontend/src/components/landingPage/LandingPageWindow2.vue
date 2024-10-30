<template>
   <!-- Features Section -->
   <section class="features">
      <div class="container">
        <div class="features-grid">
          <CustomFeature v-for="feature in features"
                        :key="feature.title"
                        :feature="feature.title"
                        :content="feature.content"
                        :path="feature.pic"
            />
        </div>
      </div>
    </section>
</template>

<script setup>
import CustomFeature from './landingPageInnerComponents/CustomFeature.vue';
import allInOneImage from '@/assets/landingPagePhotos/allInOne.png';
import secure from '@/assets/landingPagePhotos/secure.png';
import customizable from '@/assets/landingPagePhotos/customizable.png';

components: { CustomFeature}

const features = [
    {title: 'Customizable templates', content:"Free designs to launch your resturant under 5 minutes.",
     pic: customizable
    }, 
    {title: 'Secure and hassle free', content:"Your security is our priority; more than 1,000 users trust us with their resturants.",
        pic:secure
    }, 
    {title: 'All in one', content:"Forget about doing anything with your hand, comp-name takes care of it all",
        pic: allInOneImage
    }]


</script>

<style scoped>
 /* Features Section */
.features {
  padding: 60px 20px;
  text-align: center;
}

.features-grid {
  display: flex;
  gap: 40px;
  justify-content: center;
  flex-wrap: wrap;
}



</style>