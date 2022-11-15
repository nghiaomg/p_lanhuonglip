(function () {
    var circle2 = circliful.newCircle({
        percent: 50,
        id: 'circle2',
        // type: 'simple',
        type: 'plain',
        // icon: 'f179',
        text: 'TP Wins',
        noPercentageSign: true,
        backgroundCircleWidth: 8,
        foregroundCircleWidth: 8,
        progressColors: [
            {percent: 1, color: 'red'},
            {percent: 30, color: 'red'},
            {percent: 50, color: 'red'}
        ]
    });
})();