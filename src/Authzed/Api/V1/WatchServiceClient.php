<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Authzed\Api\V1;

/**
 */
class WatchServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Authzed\Api\V1\WatchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function Watch(\Authzed\Api\V1\WatchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/authzed.api.v1.WatchService/Watch',
        $argument,
        ['\Authzed\Api\V1\WatchResponse', 'decode'],
        $metadata, $options);
    }

}
