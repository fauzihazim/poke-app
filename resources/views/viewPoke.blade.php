<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
    <div class="container">
        <div class="columns">
            @foreach ($results as $result)
            <div class="column is-3">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-1by1">
                            <img
                                src={{ $result["img"] }}
                                alt="Image 1"
                                loading="lazy">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                <img
                                    src={{ $result["img"] }}
                                    alt="Placeholder image"
                                    loading="lazy">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">{{ $result["name"] }}</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>
            
                        <div class="content">Lorem<a>@bulmaio</a>. <a href="#">#css</a>
                            <a href="#">#responsive</a>
                            <br />
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="#" class="card-footer-item">
                            <span class="icon is-medium has-text">
                                <i class="fas fa-heart"></i>
                            </span>
                        </a>
                        <a href="#" class="card-footer-item">
                            <span class="icon is-medium has-text">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                        </a>
                    </footer>
                </div>
            </div>
            @endforeach
        </div>
        <nav class="pagination" role="navigation" aria-label="pagination">
            <a href="{{ $results->previousPageUrl() }}" class="pagination-previous" {{ $results->previousPageUrl() == null ? 'disabled' : '' }} title="This is the first page">Previous</a>
            <a href="{{ $results->nextPageUrl() }}" class="pagination-next" {{ $results->nextPageUrl() == null ? 'disabled' : ''  }}>Next page</a>
            <ul class="pagination-list">
                <li>
                    <a href="?page=1" class="pagination-link {{ $results->currentPage() == '1' ? 'is-current' : ''  }}" aria-label="Page 1">1</a>
                </li>
                <li>
                    <a href="?page=2" class="pagination-link {{ $results->currentPage() == '2' ? 'is-current' : ''  }}" aria-label="Goto page 2">2</a>
                </li>
                <li>
                    <a href="?page=3" class="pagination-link {{ $results->currentPage() == '3' ? 'is-current' : ''  }}" aria-label="Goto page 3">3</a>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>