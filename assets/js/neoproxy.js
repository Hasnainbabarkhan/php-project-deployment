(function(){
var srv, requests=[], in0 = {requests: requests, context: {F_2241$$: {}}}, c=0;

if (window.ospm_pageData && window.ospm_pageData.F_9903$$) {
	in0.context.F_9903$$ = window.ospm_pageData.F_9903$$;
}

if (window.ospm_initialServer) {
    srv = window.ospm_initialServer;
    if (srv.indexOf('/', srv.length-1) !== srv.length-1) {
        srv += '/';
    }
} else {
    return;
}

function cb() {
	window.ospm_prefetching = false;
	if (window.ospm_prefetchingCallback && typeof window.ospm_prefetchingCallback === 'function') {
		window.ospm_prefetchingCallback();
	}
}

function add(service, input) {
    requests.push({id: ('' + c++), service: service, data: input, ctx:{F_10070$$: true}});
}

function exec() {
    var http;
    if (requests.length === 0) {
        return;
    }
    window.ospm_prefetching = true;
    http = new XMLHttpRequest();
    http.open('POST', srv+'neo/?prefetch', true);    
    http.onload = cb;
    http.onerror = cb;
    http.ontimeout = cb;
    http.withCredentials = true;    
    http.setRequestHeader('Content-type', 'application/json; charset=utf-8');    
    http.send(JSON.stringify(in0));
}
add('gps.vorgangPrefetch',{F_71625$$:{DOMAIN_GPS_STARTDATEN:{DS:"GPS_STARTDATEN_DEFINITIONSSCHLUESSEL",sch:"S-ONLBNK-NEO"}}});
exec();
})();