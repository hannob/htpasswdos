background
==========

[htpasswDoS: Local Denial of Service via Apache httpd password hashes](https://blog.fuzzing-project.org/56-htpasswDoS-Local-Denial-of-Service-via-Apache-httpd-password-hashes.html)

htpasswdos
==========

In this repository you'll find examples to cause a denial of service
via htpasswd files in Apache httpd.

In the [subdirectory htpasswdos-manual](htpasswdos-manual/) you can find a simple .htaccess
and password file. Uploading that to a webserver with htaccess and
authentication enabled and trying to log into it with the username
guest and any password will cause several hours of ressource exhaustion
on the server. The file path in the file "pass" needs to be adapted.

In the [subdirectory htpasswdos-php](htpasswdos-php/) you'll find a php script
that will do all that automatically. It'll create a suitable .htaccess
and password file in a subdirectory and will then call it multiple
times via iframes.

If you want to protect against this kind of attack you can apply
[this patch](apr-util-1.5-limit-dos.patch) against apr-util.
