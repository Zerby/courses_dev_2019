# TOP Article

i = 100000
while [[ i < 1000000 ]]; do
	touch /tmp/i.log

    bzcat 2014-09.log.bz2 | head -n i |tail -100000 | cut -d ' ' -f7 | grep "article" | sort | uniq -dc | sort -r > /tmp/i.log

	((i+100000))

done

paste /tmp/100000.log /tmp/200000.log /tmp/300000.log /tmp/400000.log /tmp/500000.log /tmp/600000.log /tmp/700000.log /tmp/800000.log /tmp/900000.log /tmp/1000000.log

rm /tmp/100000.log /tmp/200000.log /tmp/300000.log /tmp/400000.log /tmp/500000.log /tmp/600000.log /tmp/700000.log /tmp/800000.log /tmp/900000.log /tmp/1000000.log
