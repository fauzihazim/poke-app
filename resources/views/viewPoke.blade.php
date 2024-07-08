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
    <!-- Main container -->
    <nav class="level mt-3 mx-2">
        <!-- Left side -->
        <div class="level-item has-text-centered">
            <form action="" method="get">
                <div class="field has-addons">
                    <p class="control">
                        <span class="select">
                            <select>
                                <option value="name">name</option>
                                <option value="id">id</option>
                                <option value="species">species</option>
                            </select>
                        </span>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" type="text" placeholder="Searching ...">
                    </p>
                    <p class="control">
                        <button class="button is-success">
                            <span class="icon-text">
                                <span class="icon">
                                    <i class="fas fa-search"></i>
                                </span>
                                <span>Search</span>
                            </span>
                        </button>
                    </p>
                </div>
            </form>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item"><a class="button is-success">Login</a></p>
            <p class="level-item"><a class="button is-link">Register</a></p>
        </div>
    </nav>
    <div class="dropdown is-hoverable mx-6 mb-3">
        <div class="dropdown-trigger">
          <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
            <span>Show me: {{ $perPage }}</span>
            <span class="icon is-small">
                <i class="fas fa-angle-down" aria-hidden="true"></i>
            </span>
          </button>
        </div>
        <div class="dropdown-menu" id="dropdown-menu4" role="menu">
            <div class="dropdown-content">
                <a href="#" class="dropdown-item"> 4 </a>
                <a href="#" class="dropdown-item"> 8 </a>
                <a href="#" class="dropdown-item"> 12 </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item"> All </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($results as $result)
                <div class="column is-3">
                    <div class="card ml-3">
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
        <nav class="pagination ml-2 mb-3" role="navigation" aria-label="pagination">
            <a href="{{ $results->previousPageUrl() }}" class="pagination-previous" {{ $results->previousPageUrl() == null ? 'disabled' : '' }} title="This is the first page">Previous</a>
            <a href="{{ $results->nextPageUrl() }}" class="pagination-next" {{ $results->nextPageUrl() == null ? 'disabled' : ''  }}>Next page</a>
            <ul class="pagination-list">
                @foreach ($results as $result)
                    @if( $loop->first or $loop->iteration <= $lastPage )
                        <li>
                            <a href="?page={{ $loop->iteration }}" class="pagination-link {{ $results->currentPage() == $loop->iteration ? 'is-current' : ''  }}" aria-label="Page 1">{{ $loop->iteration }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</body>
</html>