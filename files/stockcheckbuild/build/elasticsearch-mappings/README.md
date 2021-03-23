## Steps to build ES Mappings

1. Visit Kibana: http://127.0.0.1:5601
2. Navigate side menu: Management >> Dev Tools
3. Begin creating mappings
    - Copy contents of stockcheck_ad.txt into the console
    - Click the "Play" button to send request
    - Repeat for: 
    	- stockcheck_blog_article.txt
    	- stockcheck_category.txt
    	- stockcheck_enterprise.txt
    	- stockcheck_feedback.txt
    	- stockcheck_person.txt
    	- stockcheck_product.txt
    	- stockcheck_quote.txt

### Useful console commands
1. Check to see all existing indices
GET _cat/indices?v

2. Delete index
DELETE /stockcheck_ad

3. Search an index for term "robo"
GET stockcheck_ad/_search?q=robo