<?php
/**
 * This file is part of Athene2.
 *
 * Copyright (c) 2013-2019 Serlo Education e.V.
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * you may not use this file except in compliance with the License
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @copyright Copyright (c) 2013-2019 Serlo Education e.V.
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @link      https://github.com/serlo-org/athene2 for the canonical source repository
 */
namespace Metadata;

return [
    'class_resolver'  => [
        __NAMESPACE__ . '\Entity\MetadataInterface'    => __NAMESPACE__ . '\Entity\Metadata',
        __NAMESPACE__ . '\Entity\MetadataKeyInterface' => __NAMESPACE__ . '\Entity\MetadataKey',
    ],
    'view_helpers'    => [
        'factories' => [
            'metadata' => __NAMESPACE__ . '\Factory\MetadataHelperFactory',
        ],
    ],
    'service_manager' => [
        'factories' => [
            __NAMESPACE__ . '\Manager\MetadataManager' => __NAMESPACE__ . '\Factory\MetadataManagerFactory',
        ],
    ],
    'di'              => [
        'definition' => [
            'class' => [
                __NAMESPACE__ . '\Listener\TaxonomyManagerListener' => [
                    'setMetadataManager' => [
                        'required' => true,
                    ],
                ],
            ],
        ],
        'instance'   => [
            'preferences' => [
                __NAMESPACE__ . '\Manager\MetadataManagerInterface' => __NAMESPACE__ . '\Manager\MetadataManager',
            ],
        ],
    ],
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity',
                ],
            ],
            'orm_default'             => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
];