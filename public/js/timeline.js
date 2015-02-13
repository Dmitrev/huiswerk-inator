;(function ($) {
    $(document).ready(function(){

        var container = $('#homework-container');
        var loadBtn = $('#load-homework');
        var endReachedText = $('#end-reached');
        var originalBtnText = null;
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

        function buttonLoading()
        {
            disableButton();

            loadBtn.find('i').removeClass('hide');
            loadBtn.find('span').text( loadBtn.attr('data-loading') );
        }

        function doneLoading()
        {
            enableBtn();
            loadBtn.find('i').addClass('hide');
            loadBtn.find('span').text( originalBtnText );
        }

        function loadBtnClick()
        {


            buttonLoading();
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
                    doneLoading();

                    return true;
                }

                endReached();
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


            /* Save original span text, to revert to it later on */
            originalBtnText = loadBtn.find('span').text();
        }

        function endReached()
        {
            loadBtn.hide();
            endReachedText.removeClass('hide');

        }

        $(document).on('click', '#load-homework', loadBtnClick);

        init();

    });
})(jQuery);