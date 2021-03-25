var page = require('webpage').create(),
    system = require('system'),
    address, output, pageWidth, pageHeight;

if (system.args.length < 3 || system.args.length > 5) {
    console.log('Usage: URL filename width height');
    phantom.exit(1);
}
else
{
    address = system.args[1];
    output = system.args[2];
    page.viewportSize = { width: 600, height: 600 };

    if(system.args.length > 2)
    {
        pageWidth = parseInt(system.args[3], 10);
        pageHeight = parseInt(system.args[4], 10);
        page.viewportSize = { width: pageWidth, height: pageHeight };
    }
    page.viewportSize = { width: 600, height: 600 };
}

page.open(address, function (status) {
    if (status !== 'success') {
        console.log('Unable to load the address!');
        phantom.exit(1);
    } else {
        window.setTimeout(function () {
            page.render(output);
            phantom.exit();
        }, 200);
    }
});