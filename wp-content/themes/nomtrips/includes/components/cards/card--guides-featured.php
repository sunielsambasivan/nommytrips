<article class="card--guides-featured" href="#">
  <div class="card--guides-featured--image">
    <img src="http://localhost:8888/nomtrips/wp-content/uploads/2016/08/feature_guide_placeholder.jpg" alt="Click to visit this guide" />
  </div>
  
  <header class="card--guides-featured--title">
    <h3 class="card--guides-featured--heading">Guide Title</h3>
  </header>
  
  <div class="card--guides-featured--content">
    <p>Selfies street art celiac, artisan actually pug photo booth drinking vinegar.</p>
    <?php
    if( (rand(0, 1)) )
      echo "<p>Organic ramps listicle, occupy meditation chia small batch freegan locavore bespoke.</p>";
    
    if( (rand(0, 1)) )
      echo "<p>Whatever irony tacos gochujang mixtape, church-key crucifix shoreditch. Tote bag tilde meditation heirloom church-key.</p>";
    ?>
  </div>
  
  <footer class="card--guides-featured--action">
    <a href="#">Read More</a>
  </footer>
</article>
