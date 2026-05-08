<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RdKafka\Conf;
use RdKafka\Producer;

/**
 * @see https://arnaud-lb.github.io/php-rdkafka-doc/phpdoc/rdkafka.examples-producer.html
 */
class KafkaProducerTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:producer-test';

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
        $conf->set('metadata.broker.list', '192.168.100.30:9092');
        // $conf->set('log_level', (string)LOG_DEBUG);
        // $conf->set('debug', 'all');

        $producer = new Producer($conf);
        $topic = $producer->newTopic('test');

        for ($i = 0; $i < 10; $i++) {
            $topic->produce(RD_KAFKA_PARTITION_UA, 0, "Message $i");
            $producer->poll(0);
        }

        for ($flushRetries = 0; $flushRetries < 10; $flushRetries++) {
            $result = $producer->flush(10000);
            if ($result === RD_KAFKA_RESP_ERR_NO_ERROR) {
                break;
            }
        }

        if ($result !== RD_KAFKA_RESP_ERR_NO_ERROR) {
            throw new \RuntimeException('Was unable to flush, messages might be lost!');
        }
    }
}
