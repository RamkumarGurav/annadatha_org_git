<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-03-01 00:43:35 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 00:43:35 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 01:21:40 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 01:21:40 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 02:25:06 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 02:25:06 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:13 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:14 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:14 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:50 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:50 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:11:50 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:12:23 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:40:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 03:40:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:17:18 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:17:18 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:19:07 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:19:07 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:38:16 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:38:16 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:42:24 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 04:42:24 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 05:01:30 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 05:01:30 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 05:21:22 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 05:21:22 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 05:26:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'group by pc.product_combination_id' at line 1 - Invalid query: select pc.product_combination_id  from product as p  , brand_master as m, product_in_store as pis, product_category as pcat, product_combination as pc JOIN product_combination_attribute as pca ON pca.product_combination_id=pc.product_combination_id  , product_image as pi    ,  category as c    where m.brand_id=p.brand_id and p.status=1 and pis.product_id=p.product_id and pis.store_id=1 and pis.status=1 and pcat.product_id = p.product_id  and pc.product_id=p.product_id and pi.product_image_id = pc.product_image_id and pc.product_combination_id=pis.product_combination_id and pc.product_id = pis.product_id and pis.final_price !='' and pis.status=1 and pc.status=1 and  c.category_id = pcat.category_id and c.status=1  and pis.store_id =1  and pcat.category_id in (7,9,8,2)  and ( m.brand_name like ('%Tricoderma%')  and (p.name like ('%Tricoderma%') or pc.product_display_name like ('%Tricoderma%')  group by pc.product_combination_id  
ERROR - 2024-03-01 05:53:17 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 05:53:17 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:29:48 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:29:48 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:31:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:31:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:34:12 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:34:12 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:34:36 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:34:36 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:36:05 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:36:05 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:50:43 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:50:43 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:51:14 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:51:14 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:55:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:55:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:56:38 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 06:56:38 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:04:12 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:04:12 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:11:23 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:11:24 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:23:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:23:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:28:01 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:28:01 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:29:51 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:29:51 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:35:08 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:35:08 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:48:41 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:48:41 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:48:44 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:48:44 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:52:20 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 07:52:20 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 08:29:03 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 08:29:03 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:02:51 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:02:51 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:02:51 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:02:52 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:02:52 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:02:52 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:04:38 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:04:38 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:25:10 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:25:10 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:26:41 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:26:41 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:55:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:55:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:55:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 09:55:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:01:20 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:01:20 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:03:59 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:03:59 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:20:37 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:20:37 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:28:00 --> Severity: Notice --> Undefined variable: csrf /home/annadatha12mws/public_html/application/views/admin/login.php 69
ERROR - 2024-03-01 10:28:00 --> Severity: Notice --> Undefined variable: csrf /home/annadatha12mws/public_html/application/views/admin/login.php 69
ERROR - 2024-03-01 10:35:28 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:35:28 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:40:22 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 10:40:22 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:31:29 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:31:29 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:35:38 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:35:38 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:37:22 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:37:22 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:38:39 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:39:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:39:25 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:39:37 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:39:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:39:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:39:43 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:39:43 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:39:50 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:39:58 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:44:55 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:46:16 --> Severity: Notice --> Undefined index: total_weight /home/annadatha12mws/public_html/application/controllers/Products.php 1740
ERROR - 2024-03-01 11:46:36 --> Severity: Notice --> Undefined index: total_weight /home/annadatha12mws/public_html/application/controllers/Products.php 1740
ERROR - 2024-03-01 11:47:12 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 11:48:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:48:39 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:52:16 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:52:18 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:52:30 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 11:57:10 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:57:10 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:57:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 11:57:46 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:01:21 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:01:21 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:03:16 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:03:16 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 12:04:48 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 12:15:32 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 12:16:24 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:19:39 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:19:47 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:20:29 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:20:39 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:21:21 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:21:30 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 12:25:05 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:25:06 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:27:18 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:27:18 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:30:35 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:30:35 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:32:34 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 12:32:34 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 13:11:42 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 13:12:20 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 13:13:55 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 13:14:20 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:14:29 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:14:31 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:14:32 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:14:33 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:14:34 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:15:19 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:15:19 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Trying to get property 'name' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 202
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 203
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Trying to get property 'number' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 221
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1123
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Undefined variable: user /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 13:15:38 --> Severity: Notice --> Trying to get property 'email' of non-object /home/annadatha12mws/public_html/application/views/payment2.php 1129
ERROR - 2024-03-01 13:16:47 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:18:43 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:19:14 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:19:15 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:19:16 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:19:43 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:19:43 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:20:28 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:20:28 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:20:35 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:20:47 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:20:49 --> Severity: Notice --> Undefined index: city_id /home/annadatha12mws/public_html/application/controllers/Ajax.php 52
ERROR - 2024-03-01 13:27:54 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:27:54 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:53:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 13:53:45 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 14:01:42 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 14:01:42 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 14:02:55 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 14:02:55 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 14:02:56 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
ERROR - 2024-03-01 14:02:56 --> Severity: Notice --> Undefined index: HTTP_ACCEPT /home/annadatha12mws/public_html/application/models/Common_Model.php 366
