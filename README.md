# ip-reflector
This is a trivial IP reflector service. It shows your external IP, both for IPv6 and IPv4.
In order to obtain the latter when your client is connecting over IPv6 by default, it uses
a JSON request to a hostname that only has an A entry in DNS (IPv4).
This service also reports if there is a proxy detected via the HTTP headers.
Additionally, it reflects the user-agent reported by the browser.
A future version will also be able to report if the request came through a knwon Tor exit node.
