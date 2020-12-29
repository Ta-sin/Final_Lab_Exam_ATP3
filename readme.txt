  
1. admin can add employee        //->'/create', 'homeController@create'
2. admin can edit employee      //->/user/edit/{id}', 'homeController@edit'
3. admin can delete employee    //-> /delete/{id}', 'homeController@destroy'
4. admin can search (ajax search) //-> /search', 'LiveSearch@search

5. Employee can add product     //-> /ProductCreate', 'ProductController@create'
6. Employee can edit product    //-> /products/edit/{id}', 'ProductController@edit'
7. Employee can delete product   //-> /deleteProduct/{id}', 'ProductController@destroyProduct'


8. All the post requests are validated. 
9. Session is fully applied.
10. All the views are created including login & registration.