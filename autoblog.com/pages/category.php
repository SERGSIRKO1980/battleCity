<div class="wrap-contaier">
    <div class="zerogrid">
        <div class="wrap-box row">
            <div class="header t-center">
                <div class="wrapper">
                    <h2 class="color-yellow">FULL SERVICE CATERING, SERVICE STAFF, RENTALS, FLORAL DESIGN</h2>
                    <span>Nulla ipsum dolor lacus, suscipit adipiscing. Cum sociis natoque penatibus et ultrices volutpat</span>
                </div>
                <?php
                    $parameters = [];
                    parse_str($_SERVER['QUERY_STRING'], $parameters);
					
                    if (isset ($parameters['category'])){
						
                        get_category($parameters['category']);
                    } else if(isset ($parameters['details'])) {
                    	
                    	get_details($_SERVER['REQUEST_URI']);
                    }else{
                    		
                        start('pages'.SEPARATOR.'error_not_found'.FILE_EXTENSION);			
					}
                ?>
            </div>
        </div>
    </div>
</div>