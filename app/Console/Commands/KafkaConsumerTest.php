<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RdKafka\Conf;
use RdKafka\KafkaConsumer;

/**
 * @see https://arnaud-lb.github.io/php-rdkafka-doc/phpdoc/rdkafka.examples-high-level-consumer.html
 */
class KafkaConsumerTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consumer-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $conf = new Conf;
        $conf->set('group.id', 'myConsumerGroup');
        // Initial list of Kafka brokers
        $conf->set('metadata.broker.list', '192.168.100.30');
        $conf->set('auto.offset.reset', 'earliest');
        $conf->set('enable.partition.eof', 'true');

        $consumer = new KafkaConsumer($conf);
        $consumer->subscribe(['test']);

        echo "Waiting for partition assignment... (make take some time when\n";
        echo "quickly re-joining the group after leaving it.)\n";

        while (true) {
            $message = $consumer->consume(120 * 1000);
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    var_dump($message);
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    echo "No more messages; will wait for more\n";
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT:
                    echo "Timed out\n";
                    break;
                default:
                    throw new \Exception($message->errstr(), $message->err);
            }
        }
    }
}
