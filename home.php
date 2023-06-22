<?php
include_once("config.php");

// Check if a search query is provided
if (isset($_GET['query'])) {
  $searchQuery = $_GET['query'];

  // Prepare the SQL statement to search for movies
  $sql = "SELECT * FROM movies WHERE movie_name LIKE :searchQuery";
  $selectMovie = $conn->prepare($sql);
  $selectMovie->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
  $selectMovie->execute();

  $movies_data = $selectMovie->fetchAll();
} else {
  // If no search query is provided, fetch all movies
  $sql = "SELECT * FROM movies";
  $selectMovie = $conn->prepare($sql);
  $selectMovie->execute();

  $movies_data = $selectMovie->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">

  <style>
  .row.movie-row {
    margin-bottom: 20px;
  }
</style>
</head>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" id="search"placeholder="Search" aria-label="Search" onkeydown="searchMovies(event)">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logoutMovies.php">Sign out</a>
    </div>
  </div>
</header>
<body>
 

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row movie-row" id="movieContainer">
      <?php $count = 0; ?>
      <?php foreach ($movies_data as $movie_data) { ?>
        <div class="col-md-4">
          <div class="card shadow-sm">
            <img src="image_movies/<?php echo $movie_data['movie_image']; ?>" height="350">
            <div class="card-body">
              <h4><?php echo $movie_data['movie_name']; ?></h4>
              <p class="card-text"><?php echo $movie_data['movie_desc']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="details.php?id=<?php echo $movie_data['id']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                  <?php if ($_SESSION['is_admin'] == 'true') { ?>
                  <a href="editMovies.php?id=<?php echo $movie_data['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <?php }?>
                </div>
                <small class="text-muted">
                  <small class="text-muted">Rating: <?php echo $movie_data['movie_rating']; ?></small>
                  <small class="text-muted"><?php echo $movie_data['movie_quality']; ?></small>
                </small>
              </div>
            </div>
          </div>
        </div>
        <?php $count++; ?>
        <?php if ($count % 3 == 0) { ?>
          </div><div class="row movie-row">
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>

  <script>
    const searchInput = document.getElementById('search');
    const movieContainer = document.getElementById('movieContainer');

    // Function to search movies
    function searchMovies(event) {
      if (event.key === 'Enter') {
        const searchQuery = searchInput.value.trim();

        // Send an AJAX request to the server
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Handle the response
              const movies = JSON.parse(xhr.responseText);
              updateMovieList(movies);
            } else {
              console.error('Request failed.');
            }
          }
        };
        xhr.open('GET',`search.php?query=${encodeURIComponent(searchQuery)}`, true);
        xhr.send();
      }
    }

    // Update the movie list based on search results
    function updateMovieList(movies) {
      movieContainer.innerHTML = '';

const row = document.createElement('div');
row.classList.add('row', 'movie-row');

movies.forEach((movie, index) => {
  const col = document.createElement('div');
  col.classList.add('col-md-4');

  const card = document.createElement('div');
  card.classList.add('card', 'shadow-sm');

  const img = document.createElement('img');
  img.src = 'image_movies/' + movie.movie_image;
  img.height = '350';

  const cardBody = document.createElement('div');
  cardBody.classList.add('card-body');

  const title = document.createElement('h4');
  title.textContent = movie.movie_name;

  const description = document.createElement('p');
  description.classList.add('card-text');
  description.textContent = movie.movie_desc;

  const buttonGroup = document.createElement('div');
  buttonGroup.classList.add('btn-group');

  const viewButton = document.createElement('a');
  viewButton.href = 'details.php?id=' + movie.id;
  viewButton.classList.add('btn', 'btn-sm', 'btn-outline-secondary');
  viewButton.textContent = 'View';

  const editButton = document.createElement('a');
  editButton.href = 'editMovies.php?id=' + movie.id;
  editButton.classList.add('btn', 'btn-sm', 'btn-outline-secondary');
  editButton.textContent = 'Edit';

  const rating = document.createElement('small');
  rating.classList.add('text-muted');
  rating.textContent = 'Rating: ' + movie.movie_rating;

  const quality = document.createElement('small');
  quality.classList.add('text-muted');
  quality.textContent = movie.movie_quality;

        buttonGroup.appendChild(viewButton);
        buttonGroup.appendChild(editButton);
        cardBody.appendChild(title);
        cardBody.appendChild(description);
        cardBody.appendChild(buttonGroup);
        cardBody.appendChild(rating);
        cardBody.appendChild(quality);
        card.appendChild(img);
        card.appendChild(cardBody);
        col.appendChild(card);
        row.appendChild(col);

        if ((index + 1) % 3 === 0 || index === movies.length - 1) {
      movieContainer.appendChild(row);
      row = document.createElement('div');
      row.classList.add('row', 'movie-row');
    }
  });
    }
  </script>
</body>
</html>

