<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
    return;
}

require dirname(__DIR__, 3).'/vendor/autoload.php';
require __DIR__.'/Container7f3Zh3q/App_KernelDevDebugContainer.php';
require __DIR__.'/Container7f3Zh3q/getTwig_Runtime_SecurityCsrfService.php';
require __DIR__.'/Container7f3Zh3q/getTwig_Runtime_HttpkernelService.php';
require __DIR__.'/Container7f3Zh3q/getTwig_Mailer_MessageListenerService.php';
require __DIR__.'/Container7f3Zh3q/getTwigService.php';
require __DIR__.'/Container7f3Zh3q/getTranslatorService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_YmlService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_XliffService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_ResService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_QtService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_PoService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_PhpService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_MoService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_JsonService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_IniService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_DatService.php';
require __DIR__.'/Container7f3Zh3q/getTranslation_Loader_CsvService.php';
require __DIR__.'/Container7f3Zh3q/getSwiftmailer_TransportService.php';
require __DIR__.'/Container7f3Zh3q/getSwiftmailer_Mailer_Default_Transport_RealService.php';
require __DIR__.'/Container7f3Zh3q/getSwiftmailer_Mailer_Default_Plugin_MessageloggerService.php';
require __DIR__.'/Container7f3Zh3q/getSwiftmailer_Mailer_DefaultService.php';
require __DIR__.'/Container7f3Zh3q/getSwiftmailer_EmailSender_ListenerService.php';
require __DIR__.'/Container7f3Zh3q/getSession_Storage_NativeService.php';
require __DIR__.'/Container7f3Zh3q/getSessionService.php';
require __DIR__.'/Container7f3Zh3q/getServicesResetterService.php';
require __DIR__.'/Container7f3Zh3q/getSerializer_NameConverter_MetadataAwareService.php';
require __DIR__.'/Container7f3Zh3q/getSerializer_Mapping_CacheClassMetadataFactoryService.php';
require __DIR__.'/Container7f3Zh3q/getSerializerService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_PasswordEncoderService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Logout_Listener_CsrfTokenClearingService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_HttpUtilsService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Firewall_Map_Context_LoginService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Firewall_Map_Context_DevService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Firewall_Map_Context_ApiService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_EncoderFactory_GenericService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Csrf_TokenStorageService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Csrf_TokenManagerService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_ChannelListenerService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_AuthorizationCheckerService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_AuthenticationUtilsService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Authentication_Provider_Guard_ApiService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Authentication_Provider_Dao_LoginService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Authentication_ManagerService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Authentication_Listener_Json_LoginService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Authentication_Listener_Guard_ApiService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_Authentication_Listener_Anonymous_LoginService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_AccessMapService.php';
require __DIR__.'/Container7f3Zh3q/getSecurity_AccessListenerService.php';
require __DIR__.'/Container7f3Zh3q/getSecrets_VaultService.php';
require __DIR__.'/Container7f3Zh3q/getRouting_LoaderService.php';
require __DIR__.'/Container7f3Zh3q/getPropertyInfo_SerializerExtractorService.php';
require __DIR__.'/Container7f3Zh3q/getPropertyInfoService.php';
require __DIR__.'/Container7f3Zh3q/getPropertyAccessorService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Routes_DefaultService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_ObjectModel_PropertyDescribers_ArrayService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_ModelDescribers_ObjectService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_GeneratorLocatorService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Generator_DefaultService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Describers_SwaggerPhp_DefaultService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Describers_Route_DefaultService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Describers_ConfigService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Controller_SwaggerUiService.php';
require __DIR__.'/Container7f3Zh3q/getNelmioApiDoc_Controller_SwaggerService.php';
require __DIR__.'/Container7f3Zh3q/getMimeTypesService.php';
require __DIR__.'/Container7f3Zh3q/getMailManagerService.php';
require __DIR__.'/Container7f3Zh3q/getLexikJwtAuthentication_KeyLoaderService.php';
require __DIR__.'/Container7f3Zh3q/getLexikJwtAuthentication_JwtManagerService.php';
require __DIR__.'/Container7f3Zh3q/getLexikJwtAuthentication_EncoderService.php';
require __DIR__.'/Container7f3Zh3q/getJwtAuthService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_TwigExtension_SerializerRuntimeHelperService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_StopwatchSubscriberService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_SerializationContextFactoryService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_MetadataDriverService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_IteratorHandlerService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_FormErrorHandlerService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_DoctrineProxySubscriberService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_DeserializationContextFactoryService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_DatetimeHandlerService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_ConstraintViolationHandlerService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializer_ArrayCollectionHandlerService.php';
require __DIR__.'/Container7f3Zh3q/getJmsSerializerService.php';
require __DIR__.'/Container7f3Zh3q/getInitSystemService.php';
require __DIR__.'/Container7f3Zh3q/getFragment_Renderer_InlineService.php';
require __DIR__.'/Container7f3Zh3q/getFilesystemService.php';
require __DIR__.'/Container7f3Zh3q/getErrorControllerService.php';
require __DIR__.'/Container7f3Zh3q/getDoctrine_Orm_DefaultListeners_AttachEntityListenersService.php';
require __DIR__.'/Container7f3Zh3q/getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService.php';
require __DIR__.'/Container7f3Zh3q/getDoctrine_Orm_DefaultEntityManagerService.php';
require __DIR__.'/Container7f3Zh3q/getDoctrine_Dbal_DefaultConnectionService.php';
require __DIR__.'/Container7f3Zh3q/getDoctrineService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_Security_Voter_VoteListenerService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_Security_Voter_Security_Access_SimpleRoleVoterService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_Security_Voter_Security_Access_AuthenticatedVoterService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_Security_UserValueResolverService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_Security_Access_DecisionManagerService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_VariadicService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_SessionService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_ServiceService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_RequestAttributeService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_RequestService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_NotTaggedControllerService.php';
require __DIR__.'/Container7f3Zh3q/getDebug_ArgumentResolver_DefaultService.php';
require __DIR__.'/Container7f3Zh3q/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/Container7f3Zh3q/getContainer_EnvVarProcessorService.php';
require __DIR__.'/Container7f3Zh3q/getCacheClearerService.php';
require __DIR__.'/Container7f3Zh3q/getCache_SystemClearerService.php';
require __DIR__.'/Container7f3Zh3q/getCache_SystemService.php';
require __DIR__.'/Container7f3Zh3q/getCache_SerializerService.php';
require __DIR__.'/Container7f3Zh3q/getCache_GlobalClearerService.php';
require __DIR__.'/Container7f3Zh3q/getCache_AppClearerService.php';
require __DIR__.'/Container7f3Zh3q/getCache_AppService.php';
require __DIR__.'/Container7f3Zh3q/getCache_AnnotationsService.php';
require __DIR__.'/Container7f3Zh3q/getAnnotations_ReaderService.php';
require __DIR__.'/Container7f3Zh3q/getAnnotations_CachedReaderService.php';
require __DIR__.'/Container7f3Zh3q/getAnnotations_CacheService.php';
require __DIR__.'/Container7f3Zh3q/getAcmeApi_Event_JwtDecodedListenerService.php';
require __DIR__.'/Container7f3Zh3q/getAcmeApi_Event_JwtCreatedListenerService.php';
require __DIR__.'/Container7f3Zh3q/getTemplateControllerService.php';
require __DIR__.'/Container7f3Zh3q/getRedirectControllerService.php';
require __DIR__.'/Container7f3Zh3q/getUserServiceService.php';
require __DIR__.'/Container7f3Zh3q/getMySerializerService.php';
require __DIR__.'/Container7f3Zh3q/getJWTTokenAuthenticatorService.php';
require __DIR__.'/Container7f3Zh3q/getUserRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getToolSessionAnswerRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getToolSessionAnswerPositionRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getToolRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getStepRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getStepBackgroundRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getStatusRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getSessionStepRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getSessionStepBackgroundRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getSessionRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getNotificationRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getMessageRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getFileRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getAnswerRepositoryService.php';
require __DIR__.'/Container7f3Zh3q/getApiControllerService.php';
require __DIR__.'/Container7f3Zh3q/get_ServiceLocator_IEz6L2DService.php';
require __DIR__.'/Container7f3Zh3q/get_ServiceLocator_Beq5mCoService.php';
require __DIR__.'/Container7f3Zh3q/get_ServiceLocator_C9JCBPCService.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Symfony\Bundle\SecurityBundle\SecurityBundle';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DoctrineBundle';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Nelmio\CorsBundle\NelmioCorsBundle';
$classes[] = 'JMS\SerializerBundle\JMSSerializerBundle';
$classes[] = 'Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle';
$classes[] = 'Symfony\Bundle\TwigBundle\TwigBundle';
$classes[] = 'Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle';
$classes[] = 'Nelmio\ApiDocBundle\NelmioApiDocBundle';
$classes[] = 'Symfony\Component\HttpFoundation\RequestMatcher';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'App\Controller\ApiController';
$classes[] = 'App\Repository\AnswerRepository';
$classes[] = 'App\Repository\FileRepository';
$classes[] = 'App\Repository\MessageRepository';
$classes[] = 'App\Repository\NotificationRepository';
$classes[] = 'App\Repository\SessionRepository';
$classes[] = 'App\Repository\SessionStepBackgroundRepository';
$classes[] = 'App\Repository\SessionStepRepository';
$classes[] = 'App\Repository\StatusRepository';
$classes[] = 'App\Repository\StepBackgroundRepository';
$classes[] = 'App\Repository\StepRepository';
$classes[] = 'App\Repository\ToolRepository';
$classes[] = 'App\Repository\ToolSessionAnswerPositionRepository';
$classes[] = 'App\Repository\ToolSessionAnswerRepository';
$classes[] = 'App\Repository\UserRepository';
$classes[] = 'App\Security\JWTTokenAuthenticator';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\ChainTokenExtractor';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor';
$classes[] = 'App\Security\UserProvider';
$classes[] = 'App\Service\MySerializer';
$classes[] = 'App\Service\UserService';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'App\EventListener\AuthenticationFailureListener';
$classes[] = 'App\EventListener\JWTCreatedListener';
$classes[] = 'App\EventListener\JWTDecodedListener';
$classes[] = 'App\EventListener\JWTExpiredListener';
$classes[] = 'App\EventListener\JWTInvalidListener';
$classes[] = 'Symfony\Component\Cache\DoctrineProvider';
$classes[] = 'Symfony\Component\Cache\Adapter\PhpArrayAdapter';
$classes[] = 'Doctrine\Common\Annotations\CachedReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationRegistry';
$classes[] = 'App\EventListener\AuthenticationSuccessListener';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager';
$classes[] = 'Symfony\Component\Security\Core\Authorization\AccessDecisionManager';
$classes[] = 'Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallMap';
$classes[] = 'Symfony\Component\Security\Http\Controller\UserValueResolver';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Voter\RoleVoter';
$classes[] = 'Symfony\Bundle\SecurityBundle\EventListener\VoteListener';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Logging\LoggerChain';
$classes[] = 'Symfony\Bridge\Doctrine\Logger\DbalLogger';
$classes[] = 'Doctrine\DBAL\Logging\DebugStack';
$classes[] = 'Symfony\Bridge\Doctrine\ContainerAwareEventManager';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\PdoCacheAdapterDoctrineSchemaSubscriber';
$classes[] = 'Gedmo\Sluggable\SluggableListener';
$classes[] = 'Doctrine\ORM\Proxy\Autoloader';
$classes[] = 'Doctrine\ORM\EntityManager';
$classes[] = 'Doctrine\ORM\Configuration';
$classes[] = 'Doctrine\Persistence\Mapping\Driver\MappingDriverChain';
$classes[] = 'Doctrine\ORM\Mapping\Driver\AnnotationDriver';
$classes[] = 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultQuoteStrategy';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ManagerConfigurator';
$classes[] = 'Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor';
$classes[] = 'Doctrine\ORM\Tools\AttachEntityListenersListener';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\SerializerErrorRenderer';
$classes[] = 'Symfony\Bridge\Twig\ErrorRenderer\TwigErrorRenderer';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\Filesystem\Filesystem';
$classes[] = 'Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'App\Service\SystemService';
$classes[] = 'JMS\Serializer\Serializer';
$classes[] = 'Metadata\MetadataFactory';
$classes[] = 'Metadata\Driver\LazyLoadingDriver';
$classes[] = 'Metadata\Cache\FileCache';
$classes[] = 'JMS\Serializer\GraphNavigator\Factory\DeserializationGraphNavigatorFactory';
$classes[] = 'JMS\Serializer\Handler\LazyHandlerRegistry';
$classes[] = 'JMS\Serializer\Construction\DoctrineObjectConstructor';
$classes[] = 'JMS\Serializer\Construction\UnserializeObjectConstructor';
$classes[] = 'JMS\Serializer\Accessor\DefaultAccessorStrategy';
$classes[] = 'JMS\Serializer\EventDispatcher\LazyEventDispatcher';
$classes[] = 'JMS\Serializer\GraphNavigator\Factory\SerializationGraphNavigatorFactory';
$classes[] = 'JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory';
$classes[] = 'JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory';
$classes[] = 'JMS\Serializer\Visitor\Factory\JsonDeserializationVisitorFactory';
$classes[] = 'JMS\Serializer\Visitor\Factory\XmlDeserializationVisitorFactory';
$classes[] = 'JMS\Serializer\Handler\ArrayCollectionHandler';
$classes[] = 'JMS\Serializer\Handler\ConstraintViolationHandler';
$classes[] = 'JMS\Serializer\Handler\DateHandler';
$classes[] = 'JMS\SerializerBundle\ContextFactory\ConfiguredContextFactory';
$classes[] = 'JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber';
$classes[] = 'JMS\Serializer\Handler\FormErrorHandler';
$classes[] = 'JMS\Serializer\Handler\IteratorHandler';
$classes[] = 'JMS\Serializer\Metadata\Driver\DoctrineTypeDriver';
$classes[] = 'Metadata\Driver\DriverChain';
$classes[] = 'JMS\Serializer\Metadata\Driver\YamlDriver';
$classes[] = 'Metadata\Driver\FileLocator';
$classes[] = 'JMS\Serializer\Naming\SerializedNameAnnotationStrategy';
$classes[] = 'JMS\Serializer\Naming\CamelCaseNamingStrategy';
$classes[] = 'JMS\Serializer\Metadata\Driver\XmlDriver';
$classes[] = 'JMS\Serializer\Metadata\Driver\AnnotationDriver';
$classes[] = 'JMS\SerializerBundle\Serializer\StopwatchEventSubscriber';
$classes[] = 'JMS\Serializer\Twig\SerializerRuntimeHelper';
$classes[] = 'JMS\Serializer\Type\Parser';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler';
$classes[] = 'App\Kernel';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Encoder\LcobucciJWTEncoder';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\LcobucciJWSProvider';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleAwareListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'App\Service\MailService';
$classes[] = 'Symfony\Component\Mailer\EventListener\EnvelopeListener';
$classes[] = 'Symfony\Component\Mailer\EventListener\MessageLoggerListener';
$classes[] = 'Symfony\Component\Mime\MimeTypes';
$classes[] = 'Nelmio\ApiDocBundle\Controller\DocumentationController';
$classes[] = 'Nelmio\ApiDocBundle\Controller\SwaggerUiController';
$classes[] = 'Nelmio\ApiDocBundle\Util\ControllerReflector';
$classes[] = 'Nelmio\ApiDocBundle\Describer\ExternalDocDescriber';
$classes[] = 'Nelmio\ApiDocBundle\Describer\DefaultDescriber';
$classes[] = 'Nelmio\ApiDocBundle\Describer\RouteDescriber';
$classes[] = 'Nelmio\ApiDocBundle\Describer\SwaggerPhpDescriber';
$classes[] = 'Nelmio\ApiDocBundle\ApiDocGenerator';
$classes[] = 'Nelmio\ApiDocBundle\ModelDescriber\ObjectModelDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\ArrayPropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\BooleanPropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\DateTimePropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\FloatPropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\IntegerPropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\ObjectPropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\PropertyDescriber\StringPropertyDescriber';
$classes[] = 'Nelmio\ApiDocBundle\RouteDescriber\PhpDocDescriber';
$classes[] = 'Nelmio\ApiDocBundle\RouteDescriber\RouteMetadataDescriber';
$classes[] = 'Symfony\Component\Routing\RouteCollection';
$classes[] = 'Nelmio\ApiDocBundle\Routing\FilteredRouteCollectionBuilder';
$classes[] = 'Nelmio\CorsBundle\EventListener\CacheableResponseVaryListener';
$classes[] = 'Nelmio\CorsBundle\EventListener\CorsListener';
$classes[] = 'Nelmio\CorsBundle\Options\Resolver';
$classes[] = 'Nelmio\CorsBundle\Options\ConfigProvider';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\PropertyAccess\PropertyAccessor';
$classes[] = 'Symfony\Component\PropertyInfo\PropertyInfoExtractor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\SerializerExtractor';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationFileLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\String\LazyString';
$classes[] = 'Symfony\Component\Security\Http\Firewall\AccessListener';
$classes[] = 'Symfony\Component\Security\Http\AccessMap';
$classes[] = 'Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener';
$classes[] = 'Symfony\Component\Security\Guard\Firewall\GuardAuthenticationListener';
$classes[] = 'Symfony\Component\Security\Guard\GuardAuthenticatorHandler';
$classes[] = 'Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy';
$classes[] = 'Symfony\Component\Security\Http\Firewall\UsernamePasswordJsonAuthenticationListener';
$classes[] = 'Symfony\Component\Security\Http\Authentication\CustomAuthenticationSuccessHandler';
$classes[] = 'Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationFailureHandler';
$classes[] = 'Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider';
$classes[] = 'Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider';
$classes[] = 'Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver';
$classes[] = 'Symfony\Component\Security\Http\Authentication\AuthenticationUtils';
$classes[] = 'Symfony\Component\Security\Core\Authorization\AuthorizationChecker';
$classes[] = 'Symfony\Component\Security\Http\Firewall\ChannelListener';
$classes[] = 'Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint';
$classes[] = 'Symfony\Component\Security\Csrf\CsrfTokenManager';
$classes[] = 'Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator';
$classes[] = 'Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage';
$classes[] = 'Symfony\Component\Security\Core\Encoder\EncoderFactory';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallContext';
$classes[] = 'Symfony\Component\Security\Http\Firewall\ExceptionListener';
$classes[] = 'App\Security\AccessDeniedHandler';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallConfig';
$classes[] = 'Symfony\Component\Security\Http\HttpUtils';
$classes[] = 'Symfony\Component\Security\Http\EventListener\CsrfTokenClearingLogoutListener';
$classes[] = 'Symfony\Component\Security\Http\Logout\LogoutUrlGenerator';
$classes[] = 'Symfony\Component\Security\Core\Encoder\UserPasswordEncoder';
$classes[] = 'Symfony\Component\Security\Http\RememberMe\ResponseListener';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage';
$classes[] = 'Symfony\Component\Security\Core\User\UserChecker';
$classes[] = 'Symfony\Component\Serializer\Serializer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer';
$classes[] = 'Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ProblemNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateTimeNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DataUriNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ArrayDenormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ObjectNormalizer';
$classes[] = 'Symfony\Component\Serializer\Encoder\XmlEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\JsonEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\YamlEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\CsvEncoder';
$classes[] = 'Symfony\Component\Serializer\Mapping\Factory\CacheClassMetadataFactory';
$classes[] = 'Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory';
$classes[] = 'Symfony\Component\Serializer\Mapping\Loader\LoaderChain';
$classes[] = 'Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader';
$classes[] = 'Psr\Cache\CacheItemPoolInterface';
$classes[] = 'Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Session';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\String\Slugger\AsciiSlugger';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\StreamedResponseListener';
$classes[] = 'Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener';
$classes[] = 'Swift_Mailer';
$classes[] = 'Swift_Plugins_MessageLogger';
$classes[] = 'Swift_Events_SimpleEventDispatcher';
$classes[] = 'Swift_Transport';
$classes[] = 'Symfony\Bundle\SwiftmailerBundle\DependencyInjection\SwiftmailerTransportFactory';
$classes[] = 'Swift_Transport_SpoolTransport';
$classes[] = 'Swift_MemorySpool';
$classes[] = 'Symfony\Component\Translation\Loader\CsvFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\IcuDatFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\IniFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\JsonFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\MoFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\PoFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\QtFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\IcuResFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\XliffFileLoader';
$classes[] = 'Symfony\Component\Translation\Loader\YamlFileLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Translation\Translator';
$classes[] = 'Symfony\Component\Translation\Formatter\MessageFormatter';
$classes[] = 'Symfony\Component\Translation\IdentityTranslator';
$classes[] = 'Twig\Cache\FilesystemCache';
$classes[] = 'Twig\Extension\CoreExtension';
$classes[] = 'Twig\Extension\EscaperExtension';
$classes[] = 'Twig\Extension\OptimizerExtension';
$classes[] = 'Twig\Extension\StagingExtension';
$classes[] = 'Twig\ExtensionSet';
$classes[] = 'Twig\Template';
$classes[] = 'Twig\TemplateWrapper';
$classes[] = 'Twig\Environment';
$classes[] = 'Twig\Loader\FilesystemLoader';
$classes[] = 'Symfony\Bridge\Twig\Extension\CsrfExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\LogoutUrlExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\SecurityExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\ProfilerExtension';
$classes[] = 'Twig\Profiler\Profile';
$classes[] = 'Symfony\Bridge\Twig\Extension\TranslationExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\AssetExtension';
$classes[] = 'Symfony\Component\Asset\Packages';
$classes[] = 'Symfony\Component\Asset\PathPackage';
$classes[] = 'Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy';
$classes[] = 'Symfony\Component\Asset\Context\RequestStackContext';
$classes[] = 'Symfony\Bridge\Twig\Extension\CodeExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\RoutingExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\YamlExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\StopwatchExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpFoundationExtension';
$classes[] = 'Symfony\Component\HttpFoundation\UrlHelper';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension';
$classes[] = 'JMS\Serializer\Twig\SerializerRuntimeExtension';
$classes[] = 'Twig\Extension\DebugExtension';
$classes[] = 'Symfony\Bridge\Twig\AppVariable';
$classes[] = 'Twig\RuntimeLoader\ContainerRuntimeLoader';
$classes[] = 'Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator';
$classes[] = 'Symfony\Component\Mailer\EventListener\MessageListener';
$classes[] = 'Symfony\Bridge\Twig\Mime\BodyRenderer';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelRuntime';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler';
$classes[] = 'Symfony\Bridge\Twig\Extension\CsrfRuntime';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';

Preloader::preload($classes);
