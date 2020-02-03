$(document).ready(function(){

    //register show & hide
	$("#hideLogin").click(function() {
		$("#loginForm").hide();
        $("#registerForm").show();
	});

	$("#hideRegister").click(function() {
		$("#loginForm").show();
		$("#registerForm").hide();
    });
    
    $("#projectFeed").on('click', '.comment-btn', function(){
        console.log("click");
        
        var comment_loop = $(this).closest('.project-post').find('.comment-loop');

        comment_loop.slideToggle(500, function(){
            $(this).animate({
                scrollTop: $(this).prop('scrollHeight')
            }, 500);

        });

    });

    //love button
    $('#projectFeed').on('click', '.love-btn', function(){

        //store the comonents in variables 
        var love_btn = $(this);
        var love_icon = love_btn.find('.love-icon');
        var love_count = love_btn.find('.love-count');

        //values 
        var project_id = love_btn.data('project');

        $.post(
            '/loves/add.php',
            {
                'project_id': project_id
            },

            function(love_results){
                love_results = JSON.parse(love_results);
        
                if(love_results.error ===  false) {
                    if( love_results.loved == 'loved' ) {
                        love_icon.removeClass('far').addClass('fas');
                        love_count.html(love_results.love_count);
                    } 
                    else if(love_results.loved == 'unloved' ) {
                        love_icon.removeClass('fas').addClass('far')
                        love_count.html(love_results.love_count);

                    }
                }
             }

        );

    });

    //submit comment
    $("#projectFeed").on('submit', '.comment-form', function(e){
        e.preventDefault();

        //store comment components 
        var comment_form = $(this);
        var comment_box = comment_form.find('.comment-box');
        var comment_count = comment_form.closest('.project-post').find('.comment-count');
        var comment_loop = comment_form.closest('.project-post').find('.comment-loop');

        //store the values
        var project_id = comment_form.data('project');
        var comment_text = comment_box.val();

        // console.log(project_id, comment_text);

        if( $.trim(comment_text).length > 0 ) { //if you type something

            $.post(
                '/comments/add.php',//url
                {
                    project_id: project_id, 
                    comment: comment_text
                },//data
                function(comment_data){ //complete function
                    comment_data = JSON.parse(comment_data);
                    console.log(comment_data);

                    if(comment_data.error == false){
                        comment_count.html(comment_data.comment_count);
                        var comment_html = '';

                        $.each(comment_data.comments, function(index, comment){
                            comment_html += "<div class='comment-username'><p>";
                            comment_html += "<span class='font-weight-bold comment-username ";
                            comment_html +=(comment.user_owns == 'true') ? 'my_comment' : '';
                            comment_html += "'>" +
                            comment.username +
                            ":</span> "; 
                            comment_html += comment.comment;
                            comment_html += "</p></div>";
                        });

                        comment_loop.html(comment_html);
                        comment_loop.slideDown(500, function(){
                            comment_loop.animate({
                                scrollTop: comment_loop.prop('scrollHeight')
                            }, 500);
                
                        });
                        comment_box.val('');

                    }
                }

            );

        }

    });


    //file uploading

    $("#file-with-preview").on("change", function(){
        previewFile();
    });

    function previewFile() {
        //select our preview <img>
        //get the file contents from upload field
        //set the src of our <img> to the uploaded fild location 

        var preview = $("#img-preview");
        var file = $("#file-with-preview")[0].files[0];
        // console.log(file);

        // console.log(preview, file);

        var reader = new FileReader;

        //Run when file finishes reading
        reader.onloadend = function() {
            // console.log( reader.result );
            preview.attr('src', reader.result);
        }

        if(file){
            reader.readAsDataURL(file);
            
        } else {
            preview.attr('src', '');
        }

    } 

    //modal exercise 
    $('#modalTest').on('click', '.modal-btn', function(){
        $.get('views/users/show.php', function(data){
            $('.modal-body').html(data)
        });
            
        // console.log('click');
      
    });

    //search
    $("#search_form").on('submit', function(e){
        
    });

        $("input#search").on('keyup', function(e){
            var user_search = $(this).val();
            console.log(user_search);
            if(user_search.length > 2) {

                $.ajax({
                    method: "get",
                    url: "/search_results.php",
                    data: {
                        search: user_search
                    },
                    success: function(search_results) {
                        search_results =  JSON.parse(search_results);

                        var output = "<div class='list-group'>";
                
                        $.each(search_results, function(i, search_result){
                            if(search_result.user_id) {
                                output += "<a href='/projects?id="+search_result.id+"' class='list-group-item'>"+search_result.title+"</a>";
                            } else {
                                output += "<a href='/users?id="+search_result.id+"' class='list-group-item'>"+search_result.title+"</a>";
                            }

                        });
                        output += "</div>";
                        $("#search_results").html(output);
                        console.log(search_results);
                    }
                });
                
            } else {
                $("#search_results").html('');
            }
            console.log(user_search);

        });



        //img preview
        //if profile image is not set, display none
        //if profile image is set, show
        $("#img-preview").each(function(){

            if ($(this).attr("src") == "") 
                $(this).hide();
            else
                $(this).show();
            });





});

  