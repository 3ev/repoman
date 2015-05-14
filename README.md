#Repoman

> Lightweight repository pattern interfaces and implementations.

See [this article](https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/) for a description of the repository pattern in Laravel.

## Installation

```
$ composer require "3ev/repoman:~1.0"
```

## Usage

Repoman provides a basic interface for a repository. You can implement it
yourself, or leverage one of the supplied implementations. You can extend the
interface for your own specific repository classes.

See the phpdoc in the source files for information on the API and errors.

### Basic implementation

```php
<?php
namespace Entity\Repositories;

use Tev\Repoman\Repositories\RepositoryInterface;

class Repository implements RepositoryInterface
{
    public function getAll()
    {
        // ...
    }

    public function chunk($size, $callback)
    {
        // ...
    }

    public function find($id)
    {
        // ...
    }

    public function create(array $data)
    {
        // ...
    }

    public function update($id, array $data)
    {
        // ...
    }

    public function delete($id)
    {
        // ...
    }
}
```

or leverage one of the supplied implementations.

### Eloquent

```php
<?php
namespace Entity\Repositories\Eloquent;

use Entity\Models\ExampleModel;
use Tev\Repoman\Repositories\Eloquent\Repository;

class ExampleModelRepository extends Repository
{
    public function __construct()
    {
        $this->model = new ExampleModel;
    }
}
```

## License

MIT
