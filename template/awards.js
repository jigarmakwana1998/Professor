var LoadAwards = () => {
    GetAjaxData('db_awards.php');
    $(document).ajaxComplete(() => {
        let html = `
			<div class=" col-xs-12 col-sm-12">
				<div id="timeline_1" class="timeline clearfix">
		`;

        if (object.length > 0) {
            object.forEach((e) => {
                html += `
				<div class="timeline-item clearfix">
					<h5 class="item-period ">${e.date}</h5>
					<h4 class="item-title">${e.title}</h4>
					<p>${e.description}</p>
				</div>
				`;
            });
        }
        html += '</div>	</div>';

        $('#data').html(html);
    });
};

LoadAwards();