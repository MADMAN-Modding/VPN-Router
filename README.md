<h1>Welcome to VPN Router!</h1>
<h6>No, I could not come up with a better name</h6>

The aim of this project is to allow devices that can't use openVPN, or don't have the permissions to run openVPN, to be able to connect to an openVPN server.

<h2>Setup</h2>
<h3>Installing</h3>
<p>These instructions are for Debian based distros, change the commands as needed for your distro</p>

    sudo apt update

<h4>Install php</h4>
    
    sudo apt install php

<h4>Install Linux-wifi-hotspot</h4>

<h5>Dependencies</h5>
    
    sudo apt install libglib2.0-0 hostapd procps iproute2 iw haveged dnsmasq iptables

<p>Head over to <a href="https://github.com/lakinduakash/linux-wifi-hotspot/releases/tag/v4.7.1" target="_blank">Linux WiFi Hotspot</a> and install the latest release, or just use the command below

    wget https://github.com/lakinduakash/linux-wifi-hotspot/releases/download/v4.7.1/linux-wifi-hotspot_4.7.1_amd64.deb

    sudo dpkg -i linux-wifi-hotspot*.deb

<h4>Setting user permissions</h4>
<p>This will allow you to edit your user permissions</p>

    sudo visudo

<p>Add this line (make sure to change your username)</p>

    username ALL=(ALL) NOPASSWD: /usr/bin/create_ap, /usr/bin/pkill create_ap

<h4>Installing the web controller<h4>

    sudo apt install git

    git clone https://github.com/MADMAN-Modding/VPN-Router.git

    mkdir auth

    mkdir vpnConfigs

<h4>Running the controller</h4>
<p>Open the directory</p>
    
    cd VPN-Router

<p>Get your ip (temp)</p>

    ip a

<p>Plug your ip into the following command</p>

    php -S ip:8088
