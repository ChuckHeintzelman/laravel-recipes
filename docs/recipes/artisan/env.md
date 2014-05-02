---
Title:    Displaying the Current Environment
Topics:   artisan, environment
Code:     -
Id:       6
Position: 5
---

{problem}
You're not sure what the console environment is.

Your web page is appearing correctly, but you suspect the environment the console is using is different that the web.
{/problem}

{solution}
Use `php artisan env`

{text}
$ php artisan env
Current application environment: production
{/text}
{/solution}

{discussion}
Be careful with your environment detections.

The environment setting allows you to set up custom configurations for different machines. Most often this is used to configure database settings and API access points differently between production and development. If you do not pay close attention to your environment detection the situation can arise where web requests operate with one environment setting and console requests use a different one.

See [[Checking Your Environment]] for instructions using PHP Code to determine your environment.
{/discussion}
