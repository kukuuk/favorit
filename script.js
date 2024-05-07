document.querySelector('.burger').addEventListener('click', function(){
    this.classList.toggle('active');
    document.querySelector('.nav').classList.toggle('open');
})

document.querySelector('.nav').addEventListener('click', function(){
    document.querySelector('.burger').classList.toggle('active');
    this.classList.toggle('open');
})

function init(){
    let map = new ymaps.Map('map', {
        center: [55.66353419828725,37.86434260185237],
        zoom: 17,
        controls: ['routePanelControl']
    });

    let control = map.controls.get('routePanelControl');

    control.routePanel.state.set({
        type: 'masstransit',
        fromEnabled: true,
        from: '',
        toEnabled: false,
        to: `г. Котельники. Новая, д19`
    })

    control.options.set({
        autofocus: false
    });
}

ymaps.ready(init);