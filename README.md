# Jira API client for Laravel 5.x

Perform various operations of [Jira APIs](https://docs.atlassian.com/jira/REST/cloud/) with Laravel 5.x

## Installation

To get the latest version of `laravel-jira-rest-client`, simply add the following line to the require block of your `composer.json` file:
```
"repositories": [
    // ...
    
    {
        "type": "git",
        "url": "https://github.com/vitaly-malashevsky/laravel-jira-rest-client.git"
    }
],

"rjvandoesburg/laravel-jira-rest-client": "dev-master"
```
You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once added to your laravel project, you will want to add the service provider.
Find the `providers` key in your `config/app.php` file and register the service provider:

```
'providers' => [
    // ...

    Atlassian\JiraRest\JiraRestServiceProvider::class,
],
```

Also locate the `Aliases` key in your `config/app.php` file and  register the Facade:

```
'aliases' => [
    // ...

    'Jira' => Atlassian\JiraRest\Facades\Jira::class,
],
```

Finally, run `php artisan vendor:publish` to copy the default config into your app's config directory.
Update the .env with your proper credentials using JIRA variables from `config/jira-rest.php`.

## Usage

```
// Fetch all issues for specified project and status.
$issues = Jira::issues()->search('project=MYPROJECT and status=Open');
foreach ($issues as $issue) {
  print $issue->key;
  ...
}

...

// Get certain project details.
$project = Jira::projects()->get('MYPROJECT');
print $project->name;

```
