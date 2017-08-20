Nginx rewrite config

 location / {
	rewrite ^/(.*)$ /index.php?key=$1? last;
    }

    location /admincp {
        try_files $uri $uri/ /index.php?$args;
    }

ALTER table admin  AUTO_INCREMENT = 1
ALTER table URL  AUTO_INCREMENT = 1
ALTER table clickRate  AUTO_INCREMENT = 1

