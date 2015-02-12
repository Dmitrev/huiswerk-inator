;(function ($) {
    $(document).ready(function(){

        var container = $('#homework-container');
        var loadBtn = $('#load-homework');
        // We want to start loading content from page 2, since page 1 is always loaded by default
        var nextPage = 2;

        function fetchHomework(){
            $.ajax({
                url: base,
                type: 'GET',
                async: false,
                data: {page: nextPage},
                dataType: 'json',
                success: fetchHomeworkSuccess
            });
        }

        function enableBtn()
        {
            loadBtn.removeAttr('disabled');
        }
        function disableButton()
        {
            loadBtn.attr('disabled', true);
        }

        function loadBtnClick()
        {

            disableButton();
            fetchHomework();
        }

        function fetchHomeworkSuccess(data)
        {
                /* Put the stuff we got on the screen */
                renderHomework(data.html);

                /*
                 Check if we already reached the last page, if not
                 Increment the next page by 1, and re-enable the button
                 */
                if(  nextPage < data.lastPage )
                {
                    // Increment current page by one
                    nextPage++;
                    enableBtn();

                    return true;
                }
        }

        function renderHomework(html)
        {
            container.append(html);
        }

        function init()
        {
            // If the currentPage is set by Laravel, then just add 1 and we get the next page number
            if( typeof currentPage !== 'undefined'){
                nextPage = currentPage + 1;
            }
        }

        $(document).on('click', '#load-homework', loadBtnClick);

        init();

    });
})(jQuery);